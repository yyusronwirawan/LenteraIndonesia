<?php

namespace App\Repository\Admin;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Laravel\Fortify\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use League\Config\Exception\ValidationException;

// excel
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class UserRepository
{
    private $query = [];
    public function datatable(Request $request)
    {
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');
        // roles

        $c_roles = 'roles';
        $t_has_roles = $tableNames['model_has_roles'];
        $t_roles = $tableNames['roles'];
        $t_user = User::tableName;

        $c_model_id = $columnNames['model_morph_key'];

        $this->query[$c_roles] = <<<SQL
            (SELECT GROUP_CONCAT($t_roles.`name` SEPARATOR ', ') FROM $t_has_roles
            join $t_roles on $t_has_roles.role_id = $t_roles.id
            where $t_has_roles.$c_model_id = $t_user.id)
        SQL;

        $this->query["{$c_roles}_alias"] = $c_roles;

        $user = User::select(['id', 'name', 'email', 'active'])
            ->selectRaw('IF(active = 1, "Aktif", "Tidak Aktif") as active_str')
            ->selectRaw($this->query[$c_roles] . ' as ' . $this->query["{$c_roles}_alias"]);
        // filter
        if (isset($request->filter)) {
            $filter = $request->filter;
            if ($filter['active'] != '') {
                $user->where('active', '=', $filter['active']);
            }
            if ($filter['role'] != '') {
                $f = $filter['role'];
                $where = <<<SQL
                    ((SELECT count(*) FROM $t_has_roles
                    join $t_roles on $t_has_roles.role_id = $t_roles.id
                    where $t_has_roles.$c_model_id = $t_user.id and $t_roles.`name` = '$f') > 0)
                SQL;
                $user->whereRaw($where);
            }
        }

        return Datatables::of($user)
            ->addIndexColumn()
            ->filterColumn($this->query["{$c_roles}_alias"], function ($query, $keyword) use ($c_roles) {
                $query->whereRaw($this->query[$c_roles] . " like '%$keyword%'");
            })
            ->make(true);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'active' => ['required', 'int', 'in:1,0'],
                'password' => ['required', 'string', new Password]
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'active' => $request->active,
                'password' => Hash::make($request->password),
            ]);

            $user->assignRole($request->roles);

            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function update(Request $request)
    {
        try {
            $user = User::find($request->id);
            $request->validate([
                'id' => ['required', 'int'],
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
                'active' => ['required', 'int', 'in:1,0'],
                'password' => $request->password ? ['required', 'string', new Password] : ''
            ]);

            if ($request->password) {
                $user->password = Hash::make($request->password);
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->active = $request->active;

            $user->syncRoles($request->roles);

            $user->save();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(Request $user)
    {
        try {
            $user = User::find($user->id);
            $user->delete();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function save_password(Request $request)
    {
        try {
            $request->validate([
                'current_password' => ['required', 'string', 'max:255'],
                'new_password' => ['required', 'string', new Password]
            ]);
            $user = User::find(auth()->user()->id);
            if (Hash::check($request->current_password, $user->password)) {
                $user->password = Hash::make($request->new_password);
                $user->save();
            } else {
                throw new Exception("Password Lama Salah. Jika anda lupa silahkan hubungi administrator.");
            }
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function excel(Request $request)
    {
        // data body
        $a = User::tableName;

        $active_str = <<<SQL
                    if($a.active = 0, 'Tidak Aktif',
                        if($a.active = 1, 'Aktif',
                            'Unknown')
                    ) as active_str
                SQL;
        $model = User::selectRaw("$a.*")
            ->selectRaw($active_str);

        if ($request->active != null) {
            $model->where('active', '=', $request->active);
        }

        if ($request->search != null) {
            $search = $request->search;
            $columns = Schema::getColumnListing($a);
            $search_query = '(';
            foreach ($columns as $i => $col) {
                $search_query .= "$col like '%$search%' " . ($i == (count($columns) - 1) ? '' : 'or ');
            }
            $search_query .= ')';
            $model->whereRaw($search_query);
        }

        // role
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');
        // roles

        $t_has_roles = $tableNames['model_has_roles'];
        $t_roles = $tableNames['roles'];
        $t_user = User::tableName;

        $c_model_id = $columnNames['model_morph_key'];

        if ($request->role != '') {
            $f = $request->role;
            $where = <<<SQL
                ((SELECT count(*) FROM $t_has_roles
                join $t_roles on $t_has_roles.role_id = $t_roles.id
                where $t_has_roles.$c_model_id = $t_user.id and $t_roles.`name` = '$f') > 0)
            SQL;
            $model->whereRaw($where);
        }

        $model->orderBy('name');
        $details = $model->get();


        $strFilename = "Daftar Users Aplikasi SIA";
        $bulan_array = [
            1 => 'Januari',
            2 => 'February',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];
        $today_m = (int)Date("m");
        $today_d = (int)Date("d");
        $today_y = (int)Date("Y");

        $last_date_of_this_month =  date('t', strtotime(date("Y-m-d")));

        $date = $today_d . " " . $bulan_array[$today_m] . " " . $today_y;

        // laporan baru
        $row = 1;
        $col_start = "A";
        $col_end = "D";
        $title_excel = "Daftar Users Aplikasi SIA";
        // Header excel ================================================================================================
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Dokumen Properti
        $auth_name = auth()->user()->name;
        $spreadsheet->getProperties()
            ->setCreator($auth_name)
            ->setLastModifiedBy($auth_name)
            ->setTitle($title_excel)
            ->setSubject($auth_name)
            ->setDescription("LIst Users $date")
            ->setKeywords("Laporan, Report")
            ->setCategory("Laporan, Report");

        // set default font
        $spreadsheet->getDefaultStyle()->getFont()->setName('Calibri');
        $spreadsheet->getDefaultStyle()->getFont()->setSize(11);

        // header 2 ====================================================================================================
        $row += 1;
        $sheet->mergeCells($col_start . $row . ":" . $col_end . $row)
            ->setCellValue("A$row", "Daftar Users Aplikasi SIA");
        $sheet->getStyle($col_start . $row . ":" . $col_end . $row)->applyFromArray([
            "font" => [
                "bold" => true,
                "size" => 13
            ],
            "alignment" => [
                "horizontal" => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        // Tabel =======================================================================================================
        // Tabel Header
        $row += 2;
        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => '93C5FD',
                ]
            ],
        ];
        $sheet->getStyle($col_start . $row . ":" . $col_end . $row)->applyFromArray($styleArray);
        $row++;
        $styleArray['fill']['startColor']['rgb'] = 'E5E7EB';
        $sheet->getStyle($col_start . $row . ":" . $col_end . $row)->applyFromArray($styleArray);

        // poin-poin header disini
        $headers = [
            'No',
            'Nama',
            'Email',
            'Password',
        ];

        // apply header
        for ($i = 0; $i < count($headers); $i++) {
            $sheet->setCellValue(chr(65 + $i) . ($row - 1), $headers[$i]);
            $sheet->setCellValue(chr(65 + $i) . $row, ($i + 1));
        }

        // tabel body
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
            "alignment" => [
                'wrapText' => TRUE,
                'vertical' => Alignment::VERTICAL_TOP
            ]
        ];
        $start_tabel = $row + 1;
        foreach ($details as $detail) {
            $c = 0;
            $row++;
            $detail = (object)$detail;
            $sheet->setCellValue(chr(65 + $c) . "$row", ($row - 5));
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail->name);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail->email);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", "12345678");
        }
        // format
        // nomor center
        $sheet->getStyle($col_start . $start_tabel . ":" . $col_start . $row)
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);
        // border all data
        $sheet->getStyle($col_start . $start_tabel . ":" . $col_end . $row)
            ->applyFromArray($styleArray);

        $spreadsheet->getActiveSheet()->getStyle('B' . $start_tabel . ":B" . $row)->getNumberFormat()
            ->setFormatCode('0');

        // $code_rm = '_-[$RM-ms-MY]* #.##0,00_-;-[$RM-ms-MY]* #.##0,00_-;_-[$RM-ms-MY]* "-"??_-;_-@_-';
        // $sheet->getStyle("F" . $start_tabel . ":" . $col_end . $row)->getNumberFormat()->setFormatCode($code_rm);
        // $sheet->getStyle("G" . $start_tabel . ":" . "G" . $row)
        //     ->getNumberFormat()
        //     ->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
        // $sheet->getStyle("I" . $start_tabel . ":" . "I" . $row)
        //     ->getNumberFormat()
        //     ->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

        // // set alignment
        // $sheet->getStyle("A" . $start_tabel . ":" . "A" . $row)->getAlignment()->setHorizontal('center');
        // $sheet->getStyle("B" . $start_tabel . ":" . "B" . $row)->getAlignment()->setHorizontal('center');
        // $sheet->getStyle("C" . $start_tabel . ":" . "C" . $row)->getAlignment()->setHorizontal('center');
        // $sheet->getStyle("C" . $start_tabel . ":D" . $row)
        //     ->getAlignment()
        //     ->setHorizontal(Alignment::HORIZONTAL_LEFT);

        // footer
        // $row += 3;
        // $sheet->setCellValue("Q" . $row, "Kasui, $date");

        // $row += 3;
        // $sheet->setCellValue("Q" . $row, "(.....................................)");
        $row++;
        // // waktu dan tangggal
        $tanggal = date("d-m-Y H:i:s");
        $sheet->mergeCells($col_start . $row . ":" . $col_end . $row)
            ->setCellValue("A$row", "Data ini diambil pada tanggal dan waktu: $tanggal");

        // function for width column
        function w($width)
        {
            return 0.71 + $width;
        }

        // set width column
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

        // set  printing area
        $spreadsheet->getActiveSheet()->getPageSetup()->setPrintArea($col_start . '1:' . $col_end . $row);
        $spreadsheet->getActiveSheet()->getPageSetup()
            ->setOrientation(PageSetup::ORIENTATION_PORTRAIT);
        $spreadsheet->getActiveSheet()->getPageSetup()
            ->setPaperSize(PageSetup::PAPERSIZE_A4);

        // margin
        $spreadsheet->getActiveSheet()->getPageMargins()->setTop(1);
        $spreadsheet->getActiveSheet()->getPageMargins()->setRight(0);
        $spreadsheet->getActiveSheet()->getPageMargins()->setLeft(0);
        $spreadsheet->getActiveSheet()->getPageMargins()->setBottom(0);

        // page center on
        $spreadsheet->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);
        $spreadsheet->getActiveSheet()->getPageSetup()->setVerticalCentered(false);

        // simpan di folder
        // $writer = new Xlsx($spreadsheet);
        // $writer->save('hello world.xlsx');

        // simpan langsung
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $strFilename . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit();
    }
}

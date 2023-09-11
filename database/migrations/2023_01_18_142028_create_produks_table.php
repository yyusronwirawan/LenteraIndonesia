<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kategori_id', false, true)->nullable()->default(null);
            $table->string('nama')->nullable()->default(null);
            $table->string('slug')->nullable()->default(null)->unique();
            $table->string('foto')->nullable()->default(null);
            $table->text('keterangan')->nullable()->default(null);
            $table->string('tampilkan')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('kategori_id')
                ->references('id')->on('produk_kategoris')
                ->nullOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
};

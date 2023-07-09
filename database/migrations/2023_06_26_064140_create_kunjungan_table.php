<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKunjunganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kunjungan', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_kunjungan')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('keluhan')->nullable();
            $table->string('no_telp')->nullable();
            $table->bigInteger('no_antrian')->nullable();
            $table->bigInteger('status_pembayaran')->nullable()->default(0);
            $table->enum('triase_tujuan', ['Poli Rawat Inap', 'IGD', 'Poli Kandungan'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kunjungan');
    }
}

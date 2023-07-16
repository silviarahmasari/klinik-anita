<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekamMedisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dokter_id');
            $table->unsignedBigInteger('pasien_id');
            $table->text('anamnesa_pemeriksaan_medis');
            $table->text('diagnosa');
            $table->text('terapi')->nullable();
            $table->text('obat')->nullable();
            $table->date('tgl_pemeriksaan_medis');
            $table->foreign('dokter_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pasien_id')->references('id')->on('pasiens')->onDelete('cascade');
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
        Schema::dropIfExists('rekam_medis');
    }
}

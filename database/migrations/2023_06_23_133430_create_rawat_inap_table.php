<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawatInapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rawat_inap', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            // $table->bigInteger('id_kamar')->unsigned();
            $table->string('kamar');
            $table->string('nama_pasien');
            $table->date('check_in');
            $table->date('check_out')->nullable();
            $table->integer('nominal')->nullable();
            $table->enum('metode_pembayaran', ['Cash', 'Debit'])->nullable();
            $table->enum('status_pembayaran', ['selesai terbayar', 'belum terbayar'])->default('belum terbayar');
            $table->timestamps();
            // $table->foreign('id_kamar')->references('id')->on('kamar')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rawat_inap');
    }
}

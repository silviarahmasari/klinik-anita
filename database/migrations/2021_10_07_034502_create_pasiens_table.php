<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasiensTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('pasiens', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('user_id');
      $table->string('nama_pasien');
      $table->string('alamat_pasien');
      $table->string('tgl_datang');
      $table->string('no_telp');
      // $table->unsignedBigInteger('obat_id');
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      // $table->foreign('obat_id')->references('id')->on('obats')->onDelete('cascade');
      $table->timestamps();;
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('pasiens');
  }
}

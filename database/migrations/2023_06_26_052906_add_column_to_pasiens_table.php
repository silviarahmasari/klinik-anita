<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToPasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pasiens', function (Blueprint $table) {
            $table->bigInteger('id_pembayaran')->nullable();
            $table->bigInteger('no_rm')->nullable();
            $table->string('nik')->length(16)->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->enum('gender', ['Laki-laki', 'Perempuan'])->nullable();
            $table->enum('agama', ['Islam', 'Protestan', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu', 'Lainnya'])->nullable();
            $table->enum('status_nikah', ['Belum kawin', 'Kawin', 'Janda', 'Duda'])->nullable();
            $table->enum('pendidikan_terakhir', ['SD/MI', 'SMP/MTs', 'SMA/SMK/MA/MAK', 'Diploma', 'Sarjana', 'Lainnya'])->nullable();
            $table->enum('pekerjaan', ['ASN', 'Wiraswasta', 'Swasta', 'Pelajar', 'Lainnya'])->nullable();
            $table->enum('kewarganegaraan', ['WNA', 'WNI'])->nullable();
            $table->string('penanggung_jawab')->nullable();
            $table->enum('triase_tujuan', ['Poli Rawat Inap', 'IGD', 'Poli Kandungan'])->nullable();
            $table->string('riwayat_penyakit')->nullable();
            $table->string('riwayat_alergi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pasiens', function (Blueprint $table) {
            $table->dropColumn('id_pembayaran');
            $table->dropColumn('no_rm');
            $table->dropColumn('nik');
            $table->dropColumn('tempat_lahir');
            $table->dropColumn('tanggal_lahir');
            $table->dropColumn('gender');
            $table->dropColumn('agama');
            $table->dropColumn('status_nikah');
            $table->dropColumn('pendidikan_terakhir');
            $table->dropColumn('pekerjaan');
            $table->dropColumn('kewarganegaraan');
            $table->dropColumn('penanggung_jawab');
            $table->dropColumn('triase_tujuan');
            $table->dropColumn('riwayat_penyakit');
            $table->dropColumn('riwayat_alergi');
        });
    }
}

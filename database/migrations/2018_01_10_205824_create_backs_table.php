<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('backs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_identitaskons');
            $table->string('namakons');
            $table->string('jkkons');
            $table->text('alamatkons');
            $table->string('no_hpkons');
            $table->string('merk_mobil');
            $table->string('plat_no');
            $table->integer('harga_mobil');
            $table->string('nama_supir');
            $table->integer('harga_supir');
            $table->date('tgl_sewa');
            $table->date('tgl_kembali_awal');
            $table->date('tgl_kembali_akhir');
            $table->integer('jumlah_hari');
            $table->integer('telat');
            $table->integer('denda');
            $table->integer('total_harga');
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
        Schema::dropIfExists('backs');
    }
}

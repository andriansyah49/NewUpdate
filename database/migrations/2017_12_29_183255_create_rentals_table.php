<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_identitaskons');
            $table->string('namakons');
            $table->string('jkkons');
            $table->text('alamatkons');
            $table->string('no_hpkons');
            $table->date('tgl_sewa');
            $table->date('tgl_kembali');
            $table->integer('jumlah_hari');
            $table->integer('total_sewa');
            $table->integer('mobil_id')->unsigned();
            $table->foreign('mobil_id')->references('id')->on('mobils')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('supir_id')->unsigned();
            $table->foreign('supir_id')->references('id')->on('supirs')->onUpdate('cascade')->onDelete('cascade');
            $table->string('status');
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
        Schema::dropIfExists('rentals');
    }
}

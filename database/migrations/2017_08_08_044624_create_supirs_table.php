<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supirs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fotosupir')->nullable();
            $table->string('namasupir');
            $table->string('jksupir');
            $table->string('no_identitassupir')->unique();
            $table->string('no_hpsupir');
            $table->text('alamatsupir');
            $table->integer('harga_sewasupir')->unsigned();
            $table->text('status');
            $table->string('i');
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
        Schema::dropIfExists('supirs');
    }
}

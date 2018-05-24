<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeminjamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rolepeminjam_id')->unsigned();
            $table->foreign('rolepeminjam_id')
                    ->references('id')->on('rolepeminjams')
                    ->onDelete('cascade');
            $table->string('namapeminjam');
            $table->string('nrp_nip');
            $table->string('nohp_peminjam');
            $table->timestamps();
        });

        /*Schema::table('peminjams', function (Blueprint $table) {
            $table->foreign('rolepeminjam_id')
                    ->references('id')->on('peminjams')
                    ->onDelete('cascade');
        });*/

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjams');
    }
}

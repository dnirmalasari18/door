<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kegiatan_id')->unsigned();
            $table->foreign('kegiatan_id')
                    ->references('id')->on('kegiatans')
                    ->onDelete('cascade');
            $table->integer('peminjam_id')->unsigned();
            $table->foreign('peminjam_id')
                    ->references('id')->on('peminjams')
                    ->onDelete('cascade');
                    //tambahschedule
            $table->integer('tempat_id')->unsigned();
            $table->foreign('tempat_id')
                    ->references('id')->on('tempats')
                    ->onDelete('cascade');                
            $table->string('namabooking');
            $table->date('dateevent');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')
                    ->references('id')->on('statuss')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('bookings');
    }
}

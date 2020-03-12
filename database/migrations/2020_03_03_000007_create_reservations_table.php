<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->time('start_time');
            $table->time('stop_time');
            $table->string('extras')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

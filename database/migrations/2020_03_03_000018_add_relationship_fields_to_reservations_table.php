<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToReservationsTable extends Migration
{
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->unsignedInteger('resource_id');
            $table->foreign('resource_id', 'resource_fk_1060848')->references('id')->on('resources');
            $table->unsignedInteger('company_id');
            $table->foreign('company_id', 'company_fk_1061015')->references('id')->on('companies');
            $table->unsignedInteger('status_id');
            $table->foreign('status_id', 'status_fk_1092707')->references('id')->on('reservation_statuses');
        });
    }
}

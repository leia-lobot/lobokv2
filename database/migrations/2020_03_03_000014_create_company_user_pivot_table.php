<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('company_user', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_1065511')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('company_id');
            $table->foreign('company_id', 'company_id_fk_1065511')->references('id')->on('companies')->onDelete('cascade');
        });
    }
}

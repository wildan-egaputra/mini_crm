<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeTable extends Migration
{
    public function up()
    {
        Schema::create('employe', function (Blueprint $table) {
            $table->id();
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->unsignedBigInteger('companies_id')->nullable();
            $table->foreign('companies_id')->references('id')->on('companies')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employe');
    }
}

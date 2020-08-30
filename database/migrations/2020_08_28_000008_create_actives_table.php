<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivesTable extends Migration
{
    public function up()
    {
        Schema::create('actives', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('classification')->nullable();
            $table->string('description')->nullable();
            $table->string('cost')->nullable();
            $table->string('observations')->nullable();
            $table->string('condition')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSamplesTable extends Migration
{
    public function up()
    {
        Schema::create('samples', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('detail');
            $table->string('material')->nullable();
            $table->string('condition')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

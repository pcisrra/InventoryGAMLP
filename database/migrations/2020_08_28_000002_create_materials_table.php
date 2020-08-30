<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('description');
            $table->string('unity')->nullable();
            $table->integer('quantity')->nullable();
            $table->float('unitary_cost', 7, 2)->nullable();
            $table->float('total_cost', 7, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

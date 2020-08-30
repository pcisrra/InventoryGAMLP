<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutputMaterialsTable extends Migration
{
    public function up()
    {
        Schema::create('output_materials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('observations')->nullable();
            $table->datetime('date_sol')->nullable();
            $table->string('ots')->nullable();
            $table->string('output_unity')->nullable();
            $table->float('output_quantity', 5, 1)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

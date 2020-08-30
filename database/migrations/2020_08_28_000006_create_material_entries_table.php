<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialEntriesTable extends Migration
{
    public function up()
    {
        Schema::create('material_entries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('observations')->nullable();
            $table->datetime('entry_date')->nullable();
            $table->float('entry_cost', 7, 2)->nullable();
            $table->string('unity')->nullable();
            $table->float('quantity', 8, 3)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

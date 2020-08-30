<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActiveLocationPivotTable extends Migration
{
    public function up()
    {
        Schema::create('active_location', function (Blueprint $table) {
            $table->unsignedInteger('active_id');
            $table->foreign('active_id', 'active_id_fk_2076728')->references('id')->on('actives')->onDelete('cascade');
            $table->unsignedInteger('location_id');
            $table->foreign('location_id', 'location_id_fk_2076728')->references('id')->on('locations')->onDelete('cascade');
        });
    }
}

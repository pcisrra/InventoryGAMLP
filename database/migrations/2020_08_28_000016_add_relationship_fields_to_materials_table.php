<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMaterialsTable extends Migration
{
    public function up()
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->unsignedInteger('localization_id');
            $table->foreign('localization_id', 'localization_fk_2076863')->references('id')->on('locations');
        });
    }
}

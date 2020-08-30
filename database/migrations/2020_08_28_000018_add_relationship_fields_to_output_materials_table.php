<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOutputMaterialsTable extends Migration
{
    public function up()
    {
        Schema::table('output_materials', function (Blueprint $table) {
            $table->unsignedInteger('material_id')->nullable();
            $table->foreign('material_id', 'material_fk_2076906')->references('id')->on('materials');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_2076907')->references('id')->on('users');
        });
    }
}

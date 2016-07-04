<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisualizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visualizations', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('device_id')->nullable(false);
            
            $table->unsignedInteger('x_id')->nullable(false);
            $table->unsignedInteger('y_id')->nullable(true);
            $table->unsignedInteger('z_id')->nullable(true);
            
            $table->string('x_label')->default('x');
            $table->string('y_label')->default('y');
            $table->string('z_label')->default('z');
            
            $table->string('name')->nullable(false);
            $table->string('desc')->nullable(true);
            
            $table->string('formula')->nullable(false);
            
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('visualizations');
    }
}

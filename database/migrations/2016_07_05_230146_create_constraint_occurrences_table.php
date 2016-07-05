<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstraintOccurrencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constraint_occurrences', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('device_id')->nullable(false);
            $table->unsignedInteger('visualization_id')->nullable(false);
            $table->unsignedInteger('constraint_id')->nullable(false);
            
            $table->double('value')->nullable(false);
            
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
        Schema::drop('constraint_occurrences');
    }
}

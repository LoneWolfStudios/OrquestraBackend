<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConstrainTypeColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('constraints', function (Blueprint $table) {
            $table->enum('type', [
                "maior", "maior iqual",
                "menor", "menor igual",
                "igual"
            ])->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('constraints', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}

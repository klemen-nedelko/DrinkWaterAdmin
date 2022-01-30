<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WaterAmount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('water_amounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('amount');
            $table->timestamps();
            $table->string('date_water_input');
            $table->foreignId('users_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('water_amounts');
    }
}

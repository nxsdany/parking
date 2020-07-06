<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('cars')) {
            Schema::create('cars', function (Blueprint $table) {
                $table->id();
                $table->string('brand');
                $table->string('model');
                $table->string('color');
                $table->string('number')->unique();
                $table->integer('client_id');
                $table->foreign('client_id')->references('id')->on('clients');
                $table->boolean('parked');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}

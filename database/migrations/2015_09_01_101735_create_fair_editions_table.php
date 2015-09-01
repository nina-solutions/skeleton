<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFairEditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fair_editions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fair_id')->unsigned();
            $table->timestamps();
            $table->boolean('active');
            $table->string('year', 4);
            $table->string('longcode')->nullable();
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('description')->nullable();
            $table->string('location')->nullable();

            $table->foreign('fair_id')->references('id')->on('fairs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fair_editions');
    }
}

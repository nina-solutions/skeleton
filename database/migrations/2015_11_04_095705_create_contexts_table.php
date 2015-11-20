<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contexts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('code');
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();

            //TODO: Move in translation table
            $table->string('description');
            $table->dateTime('link')->nullable();

            $table->integer('context_id')->unsigned()->nullable();
            $table->foreign('context_id')->references('id')->on('contexts');

            $table->index('code');
            $table->index('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contexts');
    }
}

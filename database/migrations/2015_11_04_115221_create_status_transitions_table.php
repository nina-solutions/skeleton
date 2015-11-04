<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusTransitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_transitions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('from_status_id')->unsigned();
            $table->integer('to_status_id')->unsigned();
            $table->string('name');

            $table->unique(array('from_status_id', 'to_status_id'));
            $table->foreign('from_status_id')->references('id')->on('statuses');
            $table->foreign('to_status_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('status_transitions');
    }
}

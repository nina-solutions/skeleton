<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePressReleasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('press_releases', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('subhead')->nullable();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('reference')->nullable();
            $table->integer('category_id')->unsigned();

            $table->text('body');
            $table->string('notes')->nullable();

            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('press_releases');
    }
}

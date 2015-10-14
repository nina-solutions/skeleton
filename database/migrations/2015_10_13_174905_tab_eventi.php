<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabEventi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_eventi', function (Blueprint $table) {
            $table->increments('eve_id');
            $table->string('eve_desc', 30);
            $table->string('eve_href', 100)->nullable();
            $table->char('eve_codmanif', 3)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tab_eventi');
    }
}

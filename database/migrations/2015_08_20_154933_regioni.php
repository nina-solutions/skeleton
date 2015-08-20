<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Regioni extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('REGIONI', function (Blueprint $table) {
            $table->string('CDT_UTE', 2);
            $table->string('CDT_NOME_TAB', 4);
            $table->string('CDT_CODICE', 10);
            $table->string('CDT_DESCR', 40);
            $table->string('CDT_CODICE_RICLA', 10);
            $table->primary(array('CDT_UTE', 'CDT_NOME_TAB', 'CDT_CODICE'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('REGIONI');
    }
}

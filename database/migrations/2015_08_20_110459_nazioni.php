<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Nazioni extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NAZIONI', function (Blueprint $table) {
            $table->string('naz_ute', 2);
            $table->string('naz_nazione', 2);
            $table->string('naz_descr_ita', 50)->nullable();
            $table->string('naz_descr_naz', 50)->nullable();
            $table->string('naz_valuta', 3)->nullable();
            $table->string('naz_lingua', 3)->nullable();
            $table->string('naz_nazione_03', 3)->nullable();
            $table->primary(array('naz_ute', 'naz_nazione'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('NAZIONI');
    }
}

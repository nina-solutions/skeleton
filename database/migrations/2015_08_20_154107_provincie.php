<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Provincie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PROV', function (Blueprint $table) {
            $table->string('cdt_ute', 2);
            $table->string('cdt_nome_tab', 4);
            $table->string('cdt_codice', 10);
            $table->string('cdt_descr', 40);
            $table->string('cdt_codice_ricla', 10);
            $table->primary(array('cdt_ute', 'cdt_nome_tab', 'cdt_codice'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('PROV');
    }
}

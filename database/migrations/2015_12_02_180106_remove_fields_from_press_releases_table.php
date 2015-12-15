<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveFieldsFromPressReleasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('press_releases', function (Blueprint $table) {
            $table->dropColumn('subhead');
            $table->dropColumn('title');
            $table->dropColumn('subtitle');
            $table->dropColumn('body');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('press_releases', function (Blueprint $table) {
            $table->string('subhead')->nullable();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('body');
        });
    }
}

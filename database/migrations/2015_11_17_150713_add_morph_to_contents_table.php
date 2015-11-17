<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMorphToContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contents', function (Blueprint $table) {
            $table->integer('contentable_id');
            $table->string('contentable_type');

            //this is because each model belongs to one and only one content
            //attachments will never have such a constraint. My model may have 10 photos
            $table->unique(['contentable_id', 'contentable_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contents', function (Blueprint $table) {
            $table->dropUnique(['contentable_id', 'contentable_type']);
            $table->dropColumn('contentable_id');
            $table->dropColumn('contentable_type');
        });
    }
}

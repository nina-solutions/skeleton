<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('name');
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();

            //TODO: Move in translation table
            $table->string('description');
            $table->dateTime('link')->nullable();

            //In every moments of his life, a Content have a state
            //TODO: State changes may be logged in future development
            //TODO: Content reviews and content versioning can be a great extra!
            //TODO: ContentAttachment
            $table->integer('status_id')->unsigned()->nullable();
            $table->foreign('status_id')->references('id')->on('statuses');

            //Every content MUST belong to a Context
            $table->integer('context_id')->unsigned();
            $table->foreign('context_id')->references('id')->on('contexts');

            //ONLY PARENTS HERE, no link like press release with categories
            $table->integer('content_id')->unsigned()->nullable();
            $table->foreign('content_id')->references('id')->on('contents');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contents');
    }
}

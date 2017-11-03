<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLearningResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learning_resources', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('level_id')->unsigned();
            $table->string('type');
            $table->string('title');
            $table->string('description');
            $table->string('content')->nullable();
            $table->string('url')->nullable();
            $table->string('imageUrl')->nullable();
            $table->timestamps();

            $table->foreign('level_id')
                ->references('id')->on('levels')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('learning_resources');
    }
}

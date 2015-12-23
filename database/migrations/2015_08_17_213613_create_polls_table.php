<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //https://github.com/FbF/Laravel-Poll

    public function up()
    {
        Schema::create('polls', function (Blueprint $table) {

            $table->increments('id');
            $table->string('question');
            $table->string('answer1');
            $table->integer('answer1_count')->default(0);
            $table->string('answer2');
            $table->integer('answer2_count')->default(0);
            $table->string('answer3');
            $table->integer('answer3_count')->default(0);
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('polls');
    }
}

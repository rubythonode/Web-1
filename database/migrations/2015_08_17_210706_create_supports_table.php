<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supports', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('support_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->enum('status', [ 'waiting_client', 'waiting_suport', 'closet']);
            $table->enum('type', [ 'tech_support','info_and_sales','administration','web_development','pay_report']);
            $table->enum('priority', [ 'low','normal','high']);
            $table->string('subject')->nullable();
            $table->string('message',500);
            $table->string('ip',20);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('supports');
    }
}

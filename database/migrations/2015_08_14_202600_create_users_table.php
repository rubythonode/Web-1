<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('password', 60);
            $table->string('language')->default('en');
            $table->string('timezone')->default('America/New_York');
            $table->timestamp('disabled_at')->nullable(); 
            $table->enum('role', ['Root','Administrador','Support','Client'])->default('Client');
            $table->boolean('confirmed')->default(0);
            $table->string('confirmation_code', 50)->nullable(); 
            $table->string('facebook_id', 100)->nullable(); 
            $table->enum('status',['active', 'inactive'])->default('active');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['store','module','development']);
            $table->string('name', 100);
            $table->string('description', 500);
            $table->string('stripe_plan', 100)->nullable();
            $table->double('price', 10, 2);
            $table->integer('stock');
            $table->integer('low_stock')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->integer('sale_counts')->unsigned();
            $table->integer('view_counts')->unsigned();

            
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
        Schema::drop('products');
    }
}

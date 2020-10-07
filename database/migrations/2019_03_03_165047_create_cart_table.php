<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');            
            $table->integer('id_product')->default(null);
            $table->integer('id_training')->default(null);
            $table->integer('id_ebook')->default(null);
            $table->integer('qty');
            $table->decimal('unit_price', 16, 2);
            $table->decimal('total_price', 16, 2);
            $table->string('status')->default('unpaid');
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
        Schema::dropIfExists('cart');
    }
}

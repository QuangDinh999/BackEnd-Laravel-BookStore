<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartitems', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->foreignId('cart_id')->constrained('carts');
            $table->foreignId('book_id')->constrained('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cartitems');
    }
}

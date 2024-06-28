<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('ISBN');
            $table->string('name');
            $table->integer('amount');
            $table->double('price');
            $table->string('author');
            $table->string('img');
            $table->text('description');
            $table->string('publish_year');
            $table->foreignId('publisher_id')->constrained('publishers');
            $table->foreignId('categories_id')->constrained('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}

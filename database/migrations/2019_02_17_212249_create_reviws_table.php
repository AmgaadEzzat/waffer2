<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviwsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviws', function (Blueprint $table) {
            $table->increments('id');
            $table->text('Comment');
            $table->integer('userId')->unsigned();
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->integer('productid')->unsigned();
            $table->foreign('productid')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('reviws');
    }
}

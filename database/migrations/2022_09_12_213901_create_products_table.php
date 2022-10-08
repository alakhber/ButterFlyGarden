<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->references('id')->on('categories');
            $table->string('name');
            $table->string('barcode')->nullable();
            $table->string('madeby')->nullable();
            $table->string('avatar')->nullable();
            $table->string('slug')->unique();
            $table->longText('content')->nullable();
            $table->unsignedBigInteger('stok')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('instock')->default(1);

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
        Schema::dropIfExists('products');
    }
};

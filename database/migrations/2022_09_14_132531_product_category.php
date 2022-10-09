<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('product_category', function (Blueprint $table) {
            //$table->id();
            $table->uuid('id')->unique();
            $table->uuid('product_id')->nullable();//->constrained('products')->cascadeOnDelete();
            $table->uuid('category_id')->nullable();//->constrained('categories')->cascadeOnDelete();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_category');
    }

};

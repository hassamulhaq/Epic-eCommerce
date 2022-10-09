<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            // EAV table for products
            $table->id();
            $table->uuid()->unique();
            $table->uuid('product_id')->nullable(); //->constrained('products')->cascadeOnDelete();
            $table->string('attribute')->nullable();
            $table->string('value')->nullable();

            $table->timestamps();

            $table->foreign('product_id')->references('uuid')->on('products')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_attributes');
    }
};

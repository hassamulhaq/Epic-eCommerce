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
        Schema::create('collection_product', function (Blueprint $table) {
            //$table->id();
            $table->uuid()->unique();
            $table->uuid('collection_id')->nullable(); //->constrained('collections')->cascadeOnDelete();
            $table->uuid('product_id')->nullable();  //->constrained('products')->cascadeOnDelete();
            $table->timestamps();

            $table->foreign('collection_id')->references('id')->on('collections')->cascadeOnDelete();
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collection_product');
    }
};

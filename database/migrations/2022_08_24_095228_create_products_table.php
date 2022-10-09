<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->string('slug')->unique();
            $table->string('short_description', 1000)->nullable();
            $table->string('tags', 500)->nullable();
            $table->integer('length')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('sku', 200)->nullable();
            $table->string('mid_code', 50)->nullable();
            $table->string('price')->nullable();
            $table->string('regular_price')->nullable();
            $table->string('stock_quantity')->nullable();
            $table->string('backorders')->nullable();
            $table->string('low_stock_amount')->nullable();
            $table->string('stock_status')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(\App\Helpers\Constant::POST_STATUS['draft'])->comment('0=draft, 1=published, 2=trashed');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};

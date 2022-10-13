<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default(\App\Helpers\ProductHelper::PRODUCT_TYPE['simple']);
            $table->string('sku', 200);
            $table->json('additional')->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('products');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->foreignId('product_id')->nullable()->constrained('products')->nullOnDelete();
            $table->string('product_type')->nullable()->default(\App\Helpers\ProductHelper::PRODUCT_TYPE['simple']);
            $table->string('sku')->index();
            $table->decimal('total_weight', 12, 2)->default(0);
            $table->decimal('base_total_weight', 12, 2)->default(0);
            $table->string('item_quantity')->nullable();
            $table->decimal('price', 12, 2)->default(0)->comment('per_item_price');
            $table->decimal('base_price', 12, 2)->default(0)->comment('per_item_price');
            $table->decimal('tax_percent', 12, 2)->nullable()->default(0);
            $table->decimal('total_tax', 12, 2)->nullable();
            $table->decimal('base_total_tax', 12, 2)->nullable();
            $table->decimal('total', 12, 2)->default(0);
            $table->decimal('base_total', 12, 2)->default(0);
            $table->json('additional')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};

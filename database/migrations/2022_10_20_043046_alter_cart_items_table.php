<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('cart_items', function (Blueprint $table) {
            $table->string('sku')->index()->nullable();
            $table->decimal('weight', 12, 2)->default(0);
            $table->decimal('total_weight', 12, 2)->default(0);
            $table->tinyInteger('item_count')->nullable();
            $table->decimal('price', 12, 2)->default(0);
            $table->decimal('base_price', 12, 2)->default(0)->comment('without including additional charges');
            $table->decimal('total', 12, 2)->default(0);
            $table->decimal('base_total', 12, 2)->default(0)->comment('without including additional charges');
            $table->decimal('tax_percent', 12, 2)->nullable()->default(0)->comment('%');
            $table->decimal('tax_amount', 12, 2)->nullable()->default(0);
            $table->decimal('discount_percent', 12, 2)->default(0);
            $table->decimal('discount_amount', 12, 2)->default(0);
            $table->json('additional')->nullable();
        });
    }

    public function down()
    {
        Schema::table('cart_items', function (Blueprint $table) {
            $table->dropColumn([
                'sku',
                'weight',
                'total_weight',
                'item_count',
                'price',
                'base_price',
                'total',
                'base_total',
                'tax_percent',
                'tax_amount',
                'discount_percent',
                'discount_amount',
                'additional'
            ]);
        });
    }
};

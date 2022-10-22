<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('cart', function (Blueprint $table) {
            $table->string('cart_currency_code')->nullable();
            $table->decimal('grand_total', 12, 2)->nullable()->default(0);
            $table->decimal('base_grand_total', 12, 2)->nullable()->default(0)->comment('without including additional charges');
            $table->decimal('sub_total', 12, 2)->nullable()->default(0);
            $table->decimal('base_sub_total', 12, 2)->nullable()->default(0)->comment('without including additional charges');
            $table->decimal('tax_total', 12, 2)->nullable()->default(0);
            $table->decimal('base_tax_total', 12, 2)->nullable()->default(0);
            $table->decimal('discount_amount', 12, 2)->nullable()->default(0);
            $table->decimal('base_discount_amount', 12, 2)->nullable()->default(0)->comment('without including additional charges');
            $table->dateTime('conversion_time')->nullable();
        });
    }

    public function down()
    {
        Schema::table('cart', function (Blueprint $table) {
            $table->dropColumn([
                'cart_currency_code',
                'grand_total',
                'base_grand_total',
                'sub_total',
                'base_sub_total',
                'tax_total',
                'base_tax_total',
                'discount_amount',
                'base_discount_amount',
                'conversion_time'
            ]);
        });
    }
};

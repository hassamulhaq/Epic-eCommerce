<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Helpers\ProductHelper;

return new class extends Migration {
    public function up()
    {
        Schema::create('product_flat', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignId('product_id')->unique()->constrained('products')->cascadeOnDelete();
            $table->string('title', 200);
            $table->string('slug')->unique();
            $table->string('short_description', 1000)->nullable();
            $table->string('tags', 500)->nullable();
            $table->integer('length')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->decimal('weight', 12, 2)->default(0);
            $table->string('sku')->unique();
            $table->string('mid_code', 50)->nullable();
            $table->string('product_number')->nullable();
            $table->string('price')->index()->nullable();
            $table->string('regular_price')->nullable();
            $table->string('cost')->index()->nullable();
            $table->string('special_price')->index()->nullable();
            $table->date('special_price_from')->nullable();
            $table->date('special_price_to')->nullable();
            $table->string('stock_quantity')->nullable();
            $table->string('backorders')->nullable();
            $table->string('low_stock_amount')->nullable();
            $table->string('stock_status')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('featured')->default(ProductHelper::IS_FEATURED['default'])->comment('1=featured');
            $table->tinyInteger('new')->default(ProductHelper::IS_NEW['default'])->comment('0=not_new, 1=new');
            $table->tinyInteger('sold_individual')->default(ProductHelper::IS_SOLD_INDIVIDUAL['default'])->comment('0=no, 1=yes');
            $table->tinyInteger('status')->default(ProductHelper::PRODUCT_STATUS['draft'])->comment('0=draft, 1=published, 2=trashed');
            $table->foreignId('parent_id')->nullable()->constrained('product_flat');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_flat');
    }
};

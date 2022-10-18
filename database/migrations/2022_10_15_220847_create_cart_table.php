<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            //$table->uuid()->unique();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->integer('items_count')->nullable()->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart');
    }
};

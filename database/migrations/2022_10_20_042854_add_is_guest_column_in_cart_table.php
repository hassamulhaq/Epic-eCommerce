<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('cart', function (Blueprint $table) {
            $table->tinyInteger('is_guest')->nullable()->default(null);
        });
    }

    public function down()
    {
        Schema::table('cart', function (Blueprint $table) {
            $table->dropColumn(['is_guest']);
        });
    }
};

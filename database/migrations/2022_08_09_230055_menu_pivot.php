<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('menu_pivot', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->mediumInteger('parent_id');
            $table->mediumInteger('child_id');

            //$table->foreign('parent_id')->references('id')->on('menu');
            //$table->foreign('child_id')->references('id')->on('menu');
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu_pivot');
//        Schema::table('menu_pivot', function (Blueprint $table) {
//
//        });
    }
};

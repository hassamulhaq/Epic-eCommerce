<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->mediumInteger('parent_id')->unsigned()->nullable();
            $table->string('title', 50);
            $table->string('route', 50)->index();
            $table->string('route_name', 50)->index();
            $table->tinyInteger('icon_type')->default(0)->comment('0 none, 1 svg, 2 image');
            $table->string('icon', 1000)->nullable();
            $table->string('description', 500)->nullable();
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('menu');
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu');
    }
};

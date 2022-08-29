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
            $table->mediumInteger('child_id')->unsigned()->nullable();
            $table->tinyInteger('menu_type')->default(\App\Helpers\Constant::MENU_TYPE['route'])->comment('1=menu, 2=route');
            $table->string('title', 50);
            $table->string('route', 50)->nullable()->index();
            $table->string('route_name', 50)->nullable()->index();
            $table->tinyInteger('icon_type')->default(0)->comment('0 none, 1 svg, 2 image');
            $table->string('icon', 1000)->nullable();
            $table->string('description', 500)->nullable();
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('menu')->cascadeOnDelete();
            $table->foreign('child_id')->references('id')->on('menu')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('type', 30)->index()->default(\App\Helpers\AddressHelper::ADDRESS_TYPE['simple']);
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('company')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable()->comment('ISO code or name of the state, province or district');
            $table->string('postcode')->nullable()->comment('Postal code');
            $table->string('country')->nullable()->comment('ISO code of the country');
            $table->string('phone')->nullable();
            $table->string('note', 500)->nullable();
            $table->json('additional')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('addresses');
    }
};

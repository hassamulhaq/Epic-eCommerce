<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->uuid()->unique()->after('id');
            $table->foreignId('role_id')->nullable()->after('id')->constrained('roles');
            $table->string('username')->unique()->after('role_id');
            $table->string('first_name')->nullable()->after('username');
            $table->string('last_name')->nullable()->after('first_name');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name');
            $table->dropForeign(['role_id']);
            $table->dropColumn(['uuid', 'role_id', 'username', 'first_name', 'last_name']);
        });
    }
};

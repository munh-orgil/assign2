<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->string('reg_no')->unique();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('address');
            $table->string('email')->unique();
            $table->string('phone_no')->unique();
            $table->integer('role');
            $table->integer('is_valid');
            $table->integer('balance');
            $table->timestamp('validated_at')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};

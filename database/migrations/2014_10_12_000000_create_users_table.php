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
            $table->string('email')->unique();
            $table->string('password');
            $table->string('reg_no')->unique()->nullable();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('avatar');
            $table->string('address')->nullable();
            $table->string('phone_no')->unique()->nullable();
            $table->integer('role')->default(0);
            $table->integer('balance')->default(50000);
            $table->integer('is_valid')->default(0);
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

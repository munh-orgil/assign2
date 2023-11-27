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
        Schema::create('book_user', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('book_id');
            $table->integer('status');
            $table->timestampTz('created_at')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestampTz('received_at')->nullable();
            $table->timestampTz('expire_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_user');
    }
};

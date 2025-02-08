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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable(false);
            $table->string('username')->nullable(false);
            $table->string('email')->nullable(false)->unique("user_email_unique");
            $table->string('password_hash')->nullable(false);
            $table->string('status', 50);
            $table->uuid('user_role_id');
            $table->uuid('created_by');
            $table->uuid('updated_by');
            $table->timestamps();

            $table->foreign('user_role_id')->on('user_roles')->references('id');
            $table->foreign('status')->on('user_status')->references('name');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

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
            $table->id();
            // GENERAL INFO ACCOUNT
            $table->string('name');
            $table->string('email')->unique();
            $table->string('image')->default('default.png');
            $table->string('phone')->unique();
            $table->string('password');

            // SPECIAL IDENTITY
            $table->string('code', 6)->unique(); // Use string type and length of 6
            $table->integer('isverify')->default('0');
            $table->tinyInteger('type')->default('0');

            // UNDEFINED
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
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

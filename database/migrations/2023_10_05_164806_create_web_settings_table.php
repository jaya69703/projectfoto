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
        Schema::create('web_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('head_title');
            $table->string('head_desc', 720);
            $table->string('site_mail');
            $table->string('site_phone');
            $table->string('site_link');
            $table->string('image')->default('logo.svg');
            // SOCIAL LINKS
            $table->string('site_social_fb')->nullable();
            $table->string('site_social_ig')->nullable();
            $table->string('site_social_in')->nullable();
            $table->string('site_social_tw')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_settings');
    }
};

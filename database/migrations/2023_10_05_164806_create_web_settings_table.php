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
            $table->string('site_qris')->default('qris.png');
            $table->string('site_slide_1')->default('slide_1.jpg');
            $table->string('site_slide_2')->default('slide_2.jpg');
            $table->string('site_slide_3')->default('slide_3.jpg');
            $table->string('site_slide_4')->default('slide_4.jpg');
            $table->string('site_slide_5')->default('slide_5.jpg');
            $table->string('site_slide_6')->default('slide_6.jpg');
            $table->string('site_slide_7')->default('slide_7.jpg');
            $table->string('site_slide_8')->default('slide_8.jpg');
            $table->string('site_slide_9')->default('slide_9.jpg');
            $table->string('site_slide_10')->default('slide_10.jpg');
            $table->string('site_slide_11')->default('slide_11.jpg');
            $table->string('site_slide_12')->default('slide_12.jpg');
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

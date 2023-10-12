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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('page_id')->nullable();
            $table->string('page_type');
            // TYPE 0 = MAIN PAGE; 1 = SUBPAGE MAIN; 2 = SUBPAGE
            $table->string('page_name');
            $table->string('page_desc');
            $table->string('page_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};

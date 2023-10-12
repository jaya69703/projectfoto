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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            // IDENTITAS ACCOUNT
            $table->string('member_name');
            $table->date('member_start')->nullable();
            $table->date('member_end')->nullable();

            // PRIVATE DATA
            $table->string('member_kawin')->nullable();
            $table->string('member_niknumber')->nullable();
            $table->string('member_email');
            $table->string('member_phone');
            $table->string('member_placebirth')->nullable();
            $table->date('member_datebirth')->nullable();
            $table->string('member_gender')->nullable();
            $table->string('member_religion')->nullable();

            // DATA DOKUMEN MEMBER
            $table->string('docs_ktp')->nullable();
            $table->string('docs_ktp_verify')->nullable();

            // SPECIAL IDENTITY
            $table->string('code', 6);

            // UNDEFINED
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};

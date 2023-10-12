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
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            // IDENTITAS ACCOUNT
            $table->string('author_name');
            $table->date('author_start')->nullable();
            $table->date('author_end')->nullable();

            // PRIVATE DATA
            $table->string('author_kawin')->nullable();
            $table->string('author_niknumber')->nullable();
            $table->string('author_email');
            $table->string('author_phone');
            $table->string('author_placebirth')->nullable();
            $table->date('author_datebirth')->nullable();
            $table->string('author_gender')->nullable();
            $table->string('author_religion')->nullable();

            // KONTAK DARURAT
            $table->string('author_mother')->nullable();
            $table->string('author_phonemother')->nullable();
            $table->string('author_father')->nullable();
            $table->string('author_phonefather')->nullable();
            $table->string('author_wali')->nullable();
            $table->string('author_phonewali')->nullable();

            // DATA DOKUMEN STAFF
            $table->string('docs_ktp')->nullable();
            // $table->string('docs_kk')->nullable();
            // $table->string('docs_akta')->nullable();
            // $table->string('docs_npwp')->nullable();
            // $table->string('docs_bpjs')->nullable();
            $table->string('docs_ijazah')->nullable();
            // $table->string('docs_serti_0')->nullable();
            // $table->string('docs_serti_1')->nullable();
            // $table->string('docs_serti_2')->nullable();

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
        Schema::dropIfExists('authors');
    }
};

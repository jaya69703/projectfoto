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
        Schema::create('worker', function (Blueprint $table) {
            $table->id();
            // IDENTITAS ACCOUNT
            $table->string('worker_name');
            $table->string('worker_nitk')->nullable();
            $table->integer('divisi_id')->default(0);
            $table->integer('position_id')->default(0);
            $table->date('worker_start')->nullable();
            $table->date('worker_end')->nullable();
            $table->string('worker_sknumber')->nullable();

            // PRIVATE DATA
            $table->string('worker_kawin')->nullable();
            $table->string('worker_niknumber')->nullable();
            $table->string('worker_kknumber')->nullable();
            $table->string('worker_email');
            $table->string('worker_phone');
            $table->string('worker_placebirth')->nullable();
            $table->date('worker_datebirth')->nullable();
            $table->string('worker_gender')->nullable();
            $table->string('worker_religion')->nullable();

            // KONTAK DARURAT
            $table->string('worker_mother')->nullable();
            $table->string('worker_phonemother')->nullable();
            $table->string('worker_father')->nullable();
            $table->string('worker_phonefather')->nullable();
            $table->string('worker_wali')->nullable();
            $table->string('worker_phonewali')->nullable();

            // DATA DOKUMEN STAFF
            // $table->string('docs_ktp')->nullable();
            // $table->string('docs_kk')->nullable();
            // $table->string('docs_akta')->nullable();
            // $table->string('docs_npwp')->nullable();
            // $table->string('docs_bpjs')->nullable();
            // $table->string('docs_ijazah')->nullable();
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
        Schema::dropIfExists('worker');
        Schema::dropIfExists('workers');
    }
};

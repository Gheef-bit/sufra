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
        Schema::create('fra', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('pimpinan_rapat');
            $table->date('tanggal_rapat');
            $table->string('tempat_rapat');
            $table->string('peserta_rapat');
            $table->string('agenda');
            $table->string('kesimpulan');
            $table->date('tanggal_pengisian');       
            $table->string('notulis');
            $table->text('foto_ttd_notulis');    
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

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
        Schema::create('cuti', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama');
            $table->date('awal');
            $table->date('akhir');
            $table->string('jenis');
            $table->string('keterangan');
            $table->unsignedBigInteger('hubungan_id');
            $table->foreign('hubungan_id')->references('id')->on('hubungan')->onDelete('cascade')->onUpdate('cascade');
            $table->string('status')->default('Diajukan');
            $table->text('alasanvalid')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuti');
    }
};

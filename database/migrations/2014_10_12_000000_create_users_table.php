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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('role')->default(0);  // pegawai = 0, admin = 1, atasan = 2
            $table->string('nip');
            $table->string('password');
            $table->integer('tahunan')->default(0);
            $table->integer('penting')->default(0);
            $table->integer('melahirkan')->default(0);
            $table->integer('besar')->default(0);
            $table->string('golongan');
            $table->string('jabatan');
            $table->string('unitkerja');
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

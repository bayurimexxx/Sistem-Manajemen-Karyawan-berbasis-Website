<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       Schema::create('payrolls', function (Blueprint $table) {
    $table->id();
    $table->foreignId('karyawan_id')->constrained('karyawans')->onDelete('cascade');
    $table->bigInteger('gaji_pokok');
    $table->bigInteger('tunjangan');
    $table->bigInteger('potongan');
    $table->bigInteger('total_gaji');
    $table->date('periode'); // contoh: 2025-08
    $table->enum('status', ['Dibayar','Belum Dibayar'])->default('Belum Dibayar');
    $table->timestamps();

            // relasi ke tabel karyawans
            $table->foreign('karyawan_id')->references('id')->on('karyawans')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
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
    Schema::create('absensis', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('karyawan_id');
        $table->date('tanggal');
        $table->enum('status', ['Hadir', 'Cuti', 'Izin', 'Sakit']);
        $table->string('keterangan')->nullable();
        $table->timestamps();

        $table->foreign('karyawan_id')->references('id')->on('karyawans')->onDelete('cascade');
    });
}

};
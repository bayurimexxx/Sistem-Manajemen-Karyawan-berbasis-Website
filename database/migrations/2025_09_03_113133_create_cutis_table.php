<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('cutis', function (Blueprint $table) {
        $table->id();
        $table->foreignId('karyawan_id')->constrained()->onDelete('cascade');
        $table->date('tanggal_mulai');
        $table->date('tanggal_selesai');
        $table->string('keterangan')->nullable();
        $table->string('status')->default('pending'); // pending, disetujui, ditolak
        $table->timestamps();
    });
}

};
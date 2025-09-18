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
    Schema::table('payrolls', function (Blueprint $table) {
        $table->enum('status', ['Dibayar', 'Belum Dibayar'])->default('Belum Dibayar');
    });
}

public function down()
{
    Schema::table('payrolls', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payrolls', function (Blueprint $table) {
            //
        });
    }
};
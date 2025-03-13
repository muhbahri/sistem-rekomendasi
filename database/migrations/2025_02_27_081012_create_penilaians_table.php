<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    // Schema::create('penilaians', function (Blueprint $table) {
    //     $table->id();
    //     $table->foreignId('negara_id')->constrained('negara')->onDelete('cascade');
    //     $table->foreignId('kriteria_id')->constrained('kriteria')->onDelete('cascade');
    //     $table->integer('nilai');
    //     $table->timestamps();
    // });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaians');
    }
};

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
        Schema::create('detail_obats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('obat_id');
            $table->unsignedBigInteger('kriteria_id');
            $table->unsignedBigInteger('subkriteria_id');
            $table->float("cost")->default(0);
            $table->float('benefit')->default(0);
            $table->timestamps();
            $table->index('kriteria_id');
            $table->foreign('kriteria_id')->references('id')->on('kriterias')->onDelete('cascade');
            $table->index('obat_id');
            $table->foreign('obat_id')->references('id')->on('obats')->onDelete('cascade');
            $table->index('subkriteria_id');
            $table->foreign('subkriteria_id')->references('id')->on('subkriterias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_obats');
    }
};

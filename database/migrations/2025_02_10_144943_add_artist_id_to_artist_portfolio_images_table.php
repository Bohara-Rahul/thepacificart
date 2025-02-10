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
        Schema::table('artist_portfolio_images', function (Blueprint $table) {
            $table->foreignId('artist_id')->references('id')->on('pending_artist')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('artist_portfolio_images', function (Blueprint $table) {
            $table->dropColumn('artist_id');
        });
    }
};

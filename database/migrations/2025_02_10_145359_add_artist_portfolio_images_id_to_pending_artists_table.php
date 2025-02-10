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
        Schema::table('pending_artists', function (Blueprint $table) {
            $table->foreignId('portfolio_image_id')->references('id')->on('artist_portfolio_images')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pending_artists', function (Blueprint $table) {
            $table->dropColumn('portfolio_image_id');
        });
    }
};

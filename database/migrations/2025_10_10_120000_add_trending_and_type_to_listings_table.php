<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// listings table e trending_points and listing_type column add korbo

return new class extends Migration
{
    /**
     * 2 ta column add - trending_points ar listing_type
     */
    public function up(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->integer('trending_points')->default(0)->after('geometry_coordinates');
            $table->string('listing_type')->nullable()->after('trending_points');
        });
    }

    /**
     * rollback hole 2 ta column remove
     */
    public function down(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->dropColumn(['trending_points', 'listing_type']);
        });
    }
};

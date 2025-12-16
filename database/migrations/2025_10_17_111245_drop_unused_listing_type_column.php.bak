<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * unused listing_type column drop kori
     */
    public function up(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            // listing_type column drop (amra listing_type_1, 2, 3 use kori)
            if (Schema::hasColumn('listings', 'listing_type')) {
                $table->dropColumn('listing_type');
            }
        });
    }

    /**
     * rollback hole column restore
     */
    public function down(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            // column restore kori jodi lagge
            $table->string('listing_type')->nullable()->after('trending_points');
        });
    }
};

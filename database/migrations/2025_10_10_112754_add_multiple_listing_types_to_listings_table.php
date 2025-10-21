<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// purano single listing_type column bad diye 3 ta new column add korbo
// listing_type_1, listing_type_2, listing_type_3

return new class extends Migration
{
    /**
     * listings table e tin ta type column add
     */
    public function up(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            // purano listing_type column thakle drop kori
            if (Schema::hasColumn('listings', 'listing_type')) {
                $table->dropColumn('listing_type');
            }

            // 3 ta notun column add kori
            if (!Schema::hasColumn('listings', 'listing_type_1')) {
                $table->string('listing_type_1')->nullable();
            }
            if (!Schema::hasColumn('listings', 'listing_type_2')) {
                $table->string('listing_type_2')->nullable();
            }
            if (!Schema::hasColumn('listings', 'listing_type_3')) {
                $table->string('listing_type_3')->nullable();
            }
        });
    }

    /**
     * rollback hole notun 3 ta drop kore purano column restore
     */
    public function down(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            // notun 3 ta column drop
            $table->dropColumn(['listing_type_1', 'listing_type_2', 'listing_type_3']);

            // purano single column restore
            $table->string('listing_type')->nullable();
        });
    }
};

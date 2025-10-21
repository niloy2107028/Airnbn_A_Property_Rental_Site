<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * already create kora listings gulo hosts der modde distribute kori
     */
    public function up(): void
    {
        // sob host users ber kori
        $hostIds = DB::table('users')->where('role', 'host')->pluck('id')->toArray();

        // hosts thakle tabei redistribute
        if (empty($hostIds)) {
            return; // host nai skip kori
        }

        // sob listings ber kori
        $listings = DB::table('listings')->orderBy('id')->get();

        if ($listings->isEmpty()) {
            return; // listing nai skip
        }

        // round robin diye evenly distribution
        foreach ($listings as $index => $listing) {
            $hostIndex = $index % count($hostIds);
            $newOwnerId = $hostIds[$hostIndex];

            DB::table('listings')
                ->where('id', $listing->id)
                ->update(['owner_id' => $newOwnerId]);
        }
    }

    /**
     * rollback hole sob listing first host k assign
     */
    public function down(): void
    {
        // sob listings first host k assign
        $firstHostId = DB::table('users')->where('role', 'host')->value('id');

        if ($firstHostId) {
            DB::table('listings')->update(['owner_id' => $firstHostId]);
        }
    }
};

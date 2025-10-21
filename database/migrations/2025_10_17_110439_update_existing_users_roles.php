<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * age create kora users er role update kori
     */
    public function up(): void
    {

        DB::table('users')->where('username', 'niloy')->update(['role' => 'host']);
        DB::table('users')->where('username', 'rafiq')->update(['role' => 'host']);
        DB::table('users')->where('username', 'tasnim')->update(['role' => 'host']);
        DB::table('users')->where('username', 'karim')->update(['role' => 'host']);
        DB::table('users')->where('username', 'sadia')->update(['role' => 'host']);
        DB::table('users')->where('username', 'fahim')->update(['role' => 'host']);
        DB::table('users')->where('username', 'nusrat')->update(['role' => 'guest']);
        DB::table('users')->where('username', 'arif')->update(['role' => 'guest']);
        DB::table('users')->where('username', 'mim')->update(['role' => 'guest']);
    }

    /**
     * rollback hole sob k guest banabo
     */
    public function down(): void
    {
        // sob users k guest e convert
        DB::table('users')->update(['role' => 'guest']);

        // optional: created guest users delete
        DB::table('users')->where('username', 'alice_guest')->delete();
        DB::table('users')->where('username', 'bob_guest')->delete();
    }
};

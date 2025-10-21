<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * migration run hole reviews table banabo
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->text('comment')->nullable();
            $table->integer('rating')->unsigned();

            // Author foreign key (kon user review likhse)
            $table->foreignId('author_id')
                ->constrained('users')
                ->onDelete('cascade');

            // Listing foreign key (kon listing er review)
            $table->foreignId('listing_id')
                ->constrained('listings')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * rollback hole table drop
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

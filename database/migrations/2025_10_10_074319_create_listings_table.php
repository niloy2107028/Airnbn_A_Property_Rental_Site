<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * migration run korle table create hobe
     */
    public function up(): void
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image_url')->nullable();
            $table->string('image_filename')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('location')->nullable();
            $table->string('country')->nullable();

            // Geometry field (GeoJSON Point)
            $table->string('geometry_type')->default('Point');
            $table->json('geometry_coordinates'); // [longitude, latitude]

            // Owner foreign key 
            $table->foreignId('owner_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * migration rollback hole listings table drop hobe
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};

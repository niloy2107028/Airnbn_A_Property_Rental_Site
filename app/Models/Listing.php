<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    /**
     * mass assign korte parbo
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'image_url',
        'image_filename',
        'price',
        'location',
        'country',
        'geometry_type',
        'geometry_coordinates',
        'trending_points',
        'listing_type_1',
        'listing_type_2',
        'listing_type_3',
        'owner_id',
    ];

    /**
     * automatic type casting
     *
     * @var array<string, string>
     */
    protected $casts = [
        'geometry_coordinates' => 'array', // JSON column cast to array
        'price' => 'decimal:2',
        'trending_points' => 'integer',
    ];

    /**
     * model boot howar somoy event listeners set kori
     */
    protected static function booted()
    {
        static::deleting(function ($listing) {
            // listing delete hole tar sob reviews o delete
            $listing->reviews()->delete();
        });
    }

    /**
     * listing er owner (host) ke get kori
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * ei listing er sob reviews
     */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'listing_id');
    }

    /**
     * booking confirm hole trending points barabo
     */
    public function incrementTrendingPoints()
    {
        $this->increment('trending_points');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    /**
     * mass assign korte parbo
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'comment',
        'rating',
        'author_id',
        'listing_id',
    ];

    /**
     * automatic type casting
     *
     * @var array<string, string>
     */
    protected $casts = [
        'rating' => 'integer',
        'created_at' => 'datetime', // Explicitly cast createdAt equivalent
    ];

    /**
     * je review likhse tar info (user)
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * kon listing er review eita
     */
    public function listing()
    {
        return $this->belongsTo(Listing::class, 'listing_id');
    }
}

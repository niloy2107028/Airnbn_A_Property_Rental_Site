<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id',
        'user_id',
        'persons',
        'check_in_date',
        'check_out_date',
        'status',
        'special_requests'
    ];

    protected $casts = [
        'check_in_date' => 'date',
        'check_out_date' => 'date',
    ];

    /**
     * ei booking ta kon listing er jonno seta get kore
     */
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

    /**
     * je guest eta book korche tar info
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * booking ta pending kina check
     */
    public function isPending()
    {
        return $this->status === 'pending';
    }

    /**
     * confirmed hoye gese kina
     */
    public function isConfirmed()
    {
        return $this->status === 'confirmed';
    }

    /**
     * pending bookings gulo filter kore anbo
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * confirmed bookings filter korte
     */
    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    // auth::attempt use korte hoile deya lage 

    /**
     * mass assign kora jabe eita diye
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
    ];
    //mass assignment security

    /**
     * JSON e convert korle ei field gulo hide hobe
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * automatic casting e convert hobe
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * user er nijossho sob listing
     */
    public function listings()
    {
        return $this->hasMany(Listing::class, 'owner_id');
        //$user->listings returns all listings jekhane owner_id = user.id
    }

    /**
     * user ja ja review likheche
     */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'author_id');
        // $user->reviews return korbe all reviews this user authored
    }

    /**
     * ei guest er sob bookings
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
        // $user->bookings returns all bookings made by this user
        // uses default foreign key user_id

    }

    // Helper methods 
    /**
     * host kina check
     */
    public function isHost()
    {
        return $this->role === 'host';
    }

    /**
     * guest kina
     */
    public function isGuest()
    {
        return $this->role === 'guest';
    }

    /**
     * aro listing create korte parbe kina (max 5 allowed)
     */
    public function canCreateListing()
    {
        return $this->isHost() && $this->listings()->count() < 5;
    }

    /**
     * host er listing e pending bookings gulo
     */
    public function pendingBookings()
    {
        return Booking::whereHas('listing', function ($query) {
            $query->where('owner_id', $this->id);
        })->where('status', 'pending')->with(['listing', 'user'])->get();
    }

    /**
     * current e active booking ache kina
     */
    public function hasActiveBooking()
    {
        return $this->bookings()
            ->whereIn('status', ['pending', 'confirmed'])
            ->where('check_out_date', '>=', now())
            ->exists();
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'profile_photo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
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

    public const ROLE_OWNER = 'owner';
    public const ROLE_WALKER = 'walker';

    public static function roles(): array
    {
        return [
            self::ROLE_OWNER,
            self::ROLE_WALKER,
        ];
    }

    public function dogs()
    {
        return $this->hasMany(Dog::class);
    }

    public function ownedWalkSessions()
    {
        return $this->hasMany(WalkSession::class, 'owner_id');
    }

    public function walkSessions()
    {
        return $this->hasMany(WalkSession::class, 'walker_id');
    }

    public function availabilities()
    {
        return $this->hasMany(Availability::class, 'walker_id');
    }

    public function receivedReviews()
    {
        return $this->hasMany(Review::class, 'walker_id');
    }

    public function averageRating()
    {
        return round($this->receivedReviews()->avg('rating') ?? 0, 1);
    }

    public function reviewCount()
    {
        return $this->receivedReviews()->count();
    }

    public function isOwner(): bool
    {
        return $this->role === self::ROLE_OWNER;
    }

    public function isWalker(): bool
    {
        return $this->role === self::ROLE_WALKER;
    }

    public function profilePhotoUrl(): string
    {
        return $this->profile_photo
            ? asset('storage/' . $this->profile_photo)
            : asset('images/default-profile.png');
    }
}

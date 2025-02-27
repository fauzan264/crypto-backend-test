<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    public function userRoles(): HasMany
    {
        return $this->hasMany(UserRole::class, "user_role_id", "id");
    }

    public function userStatus(): HasMany
    {
        return $this->hasMany(UserStatus::class, "status", "name");
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT
     * 
     * @return mixed
     */
    public function GetJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     * 
     * @return array
     */
    public function GetJWTCustomClaim()
    {
        return [];
    }

    public static function GetRegistrationsByMonth($month, $year)
    {
        $query = self::selectRaw("MONTH(created_at) as month, YEAR(created_at) as year, COUNT(id) as total")
                    ->whereRaw("MONTH(created_at) = ? AND YEAR(created_at) = ?", [$month, $year])
                    ->groupByRaw("YEAR(created_at), MONTH(created_at)")
                    ->first();
        
        return $query;
    }
}

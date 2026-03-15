<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'role_id',
        'image',
        'phone_number',
        'gender',
        'address',
        'status',
        'email_verified_at',
    ];

    function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function hasPermission($permission)
    {
        if (!$this->role) return false;

        // Super admin bypass
        if ($this->role->name === 'Super admin') return true;

        // Load all permissions once and check in collection
        $permissions = $this->role->permissions()->pluck('name')->toArray();

        return in_array($permission, $permissions);
    }

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
}

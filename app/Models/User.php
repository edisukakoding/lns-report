<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @method static create(array $array)
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;
    public const TEACHER = 'TEACHER';
    public const ADMIN = 'ADMIN';
    public const HEADMASTER = 'HEADMASTER';
    public const STAFF = 'STAFF';
    public const PARENT = 'PARENT';
    public const STUDENT = 'STUDENT';
    public const GUEST = 'GUEST';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function makeOptionList(): array
    {
        $option = ['' => '- Pilih Akun -'];
        foreach (static::all() as $user) {
            $option[$user->id] = $user->email;
        }

        return $option;
    }

    public function personal(): HasOne
    {
        return $this->hasOne(Personal::class);
    }
}

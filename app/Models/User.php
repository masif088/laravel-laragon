<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property integer $id
 * @property integer $user_status_id
 * @property string $name
 * @property string $email
 * @property string $email_verified_at
 * @property string $password
 * @property string $password_show
 * @property string $two_factor_secret
 * @property string $two_factor_recovery_codes
 * @property string $two_factor_confirmed_at
 * @property string $remember_token
 * @property integer $current_team_id
 * @property string $profile_photo_path
 * @property string $created_at
 * @property string $updated_at
 * @property string $payment_deadline
 * @property string $first_installation
 * @property string $address
 * @property string $no_phone
 * @property integer $role
 * @property UserStatus $userStatus
 * @property Transaction[] $transactions
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',

        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * @var array
     */
    protected $fillable = ['password_show','user_status_id', 'name', 'email', 'email_verified_at', 'password', 'two_factor_secret', 'two_factor_recovery_codes', 'two_factor_confirmed_at', 'remember_token', 'current_team_id', 'profile_photo_path', 'created_at', 'updated_at', 'payment_deadline', 'first_installation', 'role', 'address', 'no_phone'];

    /**
     * @return BelongsTo
     */
    public function userStatus(): BelongsTo
    {
        return $this->belongsTo('App\Models\UserStatus');
    }

    /**
     * @return HasMany
     */
    public function transactions(): HasMany
    {
        return $this->hasMany('App\Models\Transaction','user_id');
    }


}

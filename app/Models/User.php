<?php

namespace App\Models;

//use App\Notifications\EmailVerificationNotification;
use App\Notifications\PasswordResetNotification;
//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Demande;



/**
 * @property \Illuminate\Database\Eloquent\Collection $roles
 * @property \Illuminate\Notifications\DatabaseNotificationCollection $notifications
 * @property \Illuminate\Notifications\DatabaseNotificationCollection $unreadNotifications
 *
 * @mixin \Eloquent
 */


class User extends Authenticatable ////implements MustVerifyEmail
{
    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use HasRoles;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'password_setup_token',
        'password_setup_sent_at',
    ];

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
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
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

    /**
     * Send the email verification notification.
     *
     * @return void
     */

    /**public function sendEmailVerificationNotification(): void
    {
        $this->notify(new EmailVerificationNotification()); 
    }
     */



    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new PasswordResetNotification($token));
    }

    /**
     * Get the phone number for SMS notifications.
     *
     * @param  mixed  $notifiable
     * @return string|null
     */


    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function demande()
    {
        return $this->hasMany(Demande::class);
    }


    public function routeNotificationForSms($notifiable): ?string
    {
        // Vérifier si l'utilisateur a un numéro de téléphone
        if (! empty($this->phone)) {
            return $this->phone;
        }

        return null;
    }


    public function initials()
    {
        $nameParts = explode(' ', $this->name);

        $initials = '';

        foreach ($nameParts as $part) {
            $initials .= strtoupper(substr($part, 0, 1));
        }

        return $initials;
    }

    public function isOnline(): bool
    {
        if (config('session.driver') !== 'database') {
            return false;
        }

        $lifetime = (int) config('session.lifetime', 120) * 60;

        return DB::table(config('session.table', 'sessions'))
            ->where('user_id', $this->id)
            ->where('last_activity', '>=', now()->subSeconds($lifetime)->getTimestamp())
            ->exists();
    }

    public static function getOnlineIds(array $userIds)
    {
        if (config('session.driver') !== 'database' || empty($userIds)) {
            return collect();
        }

        $lifetime = (int) config('session.lifetime', 120) * 60;

        return DB::table(config('session.table', 'sessions'))
            ->whereIn('user_id', $userIds)
            ->where('last_activity', '>=', now()->subSeconds($lifetime)->getTimestamp())
            ->pluck('user_id')
            ->unique();
    }
}



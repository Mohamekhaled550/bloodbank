<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
=======
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
>>>>>>> b541f1feb320e7ca57cfc9851f3ac4a74d946dc2
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
<<<<<<< HEAD
    use Notifiable, HasApiTokens;
=======
    use HasApiTokens, HasFactory, Notifiable;
>>>>>>> b541f1feb320e7ca57cfc9851f3ac4a74d946dc2

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
<<<<<<< HEAD
        'birth_date',
        'city_id',
        'phone',
        'd_l_d',
        'password',
        'bloodtype_id',
        'is_active',
        'device_token',



=======
        'password',
>>>>>>> b541f1feb320e7ca57cfc9851f3ac4a74d946dc2
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
<<<<<<< HEAD
        'reset_code'
=======
        'remember_token',
>>>>>>> b541f1feb320e7ca57cfc9851f3ac4a74d946dc2
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
<<<<<<< HEAD
        'password =>hashed'
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function bloodtypes()
    {
        return $this->belongsTo(BloodType::class, 'bloodtype_id');
    }

    public function donationrequests()
    {
        return $this->hasMany(DonationRequest::class, 'donationrequest_id');
    }

    public function favposts()
    {
        return $this->belongsToMany(Post::class, 'favourites')->withTimestamps();
    }


public function notificationSettings()
{
    return $this->hasMany(NotificationSetting::class);
}




    public function reports()
    {
        return $this->hasMany('Report', 'report_id');
    }


=======
    ];
>>>>>>> b541f1feb320e7ca57cfc9851f3ac4a74d946dc2
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{
    protected $fillable = [
        'user_id',
        'patient_name',
        'patient_age',
        'bloodtype_id',
        'bags_num',
        'hospital_name',
        'hospital_address',
        'city_id',
        'phone',
        'notes',
        'latitude',
        'longitude',
    ];
    protected $table = 'donationrequests';
    public $timestamps = true;

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function bloodType()
    {
        return $this->belongsTo(BloodType::class , 'bloodtype_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'donationrequest_id');
    }
}

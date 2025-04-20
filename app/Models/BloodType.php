<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{

    protected $table = 'bloodtypes';
    public $timestamps = true;

    public function users()
    {
        return $this->hasMany(User::class, 'user_id');
    }


public function notificationSettings()
{
    return $this->hasMany(NotificationSetting::class);
}


    public function donationrequests()
    {
        return $this->hasMany(DonationRequest::class, 'donationrequest_id');
    }

}

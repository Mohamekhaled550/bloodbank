<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationSetting extends Model
{
    protected $fillable = ['user_id', 'bloodtype_id', 'governorate_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function bloodtype() {
        return $this->belongsTo(Bloodtype::class);
    }

    public function governorate() {
        return $this->belongsTo(Governorate::class);
    }
}

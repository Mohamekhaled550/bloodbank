<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{

    protected $table = 'reports';
    public $timestamps = true;

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

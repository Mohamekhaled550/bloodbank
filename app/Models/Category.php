<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';
    public $timestamps = true;

    public function posts()
    {
        return $this->hasMany(Post::class, 'post_id');
    }

}

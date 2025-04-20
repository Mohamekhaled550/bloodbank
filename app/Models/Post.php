<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'posts';
    public $timestamps = true;

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function favoritedbyusers()
    {
        return $this->belongsToMany(User::class, 'favourites')->withTimestamps();
    }

}

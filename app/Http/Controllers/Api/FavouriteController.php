<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class FavouriteController extends Controller
{
    public function index()
    {
        return auth()->user()->favposts;
    }
 
    public function store($postId)
    {
        auth()->user()->favposts()->syncWithoutDetaching([$postId]);
        return response()->json(['message' => 'Added to favourites']);
    }

    public function destroy($postId)
    {
        auth()->user()->favposts()->detach($postId);
        return response()->json(['message' => 'Removed from favourites']);
    }
}



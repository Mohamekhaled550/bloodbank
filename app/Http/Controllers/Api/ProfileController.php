<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Governorate;
use App\Models\City;



class ProfileController extends Controller
{
    /**
    * ✅ FETCH USER PROFILE
    */
   public function profile(Request $request)
   {
    $user = auth()->guard('api')->user();

    if (!$user) {
        return responsejson(0, 'User not authenticated');
    }

    return responsejson(1, 'Profile data retrieved', $user);
   }

/**
     * 🔄 UPDATE PROFILE
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'email' => ['email', Rule::unique('users')->ignore($user->id)],
            'phone' => ['string', Rule::unique('users')->ignore($user->id)],
        ]);

        $user->update($request->only(['name', 'email', 'phone']));

        return response()->json(['status' => 1, 'message' => 'Profile updated successfully', 'user' => $user]);
    }

/**
 * UPDATE PASSWORD
 */

public function changePassword(Request $request){

$request->validate([
    'current_password' => ['required', 'current_password'],
    'new_password' => ['required', 'confirmed', 'min:6'],
]);

$user = Auth::user();
if(!Hash::check($request->current_password, $user->password)){
    return response()->json(['status' => 0, 'message' => 'Current password is incorrect']);
   }

   $user->update(['password' => Hash::make($request->new_password)]);

   return response()->json(['status' => 1, 'message' => 'Password updated successfully']);

}



/**
 * ADD DEVICE TOKEN TO RECIVE NOTIFICATION
 */
public function registerToken(Request $request){
    $request->validate([
        'device_token' => 'required|string',

    ]);

    $user = Auth::user();
    $user->device_token = $request->device_token;
    $user->save();

    return response()->json(['status' => 1, 'message' => 'Device token registered successfully']);

}


/**
 * REMOVE DEVICE TOKEN TO RECIVE NOTIFICATION
 */
public function removeToken(Request $request){
    $request->validate([
        'device_token' => 'required|string',

    ]);

    $user = Auth::user();
    $user->device_token = null;
    $user->save();

    return response()->json(['status' => 1, 'message' => 'Device token removed successfully']);
}



}

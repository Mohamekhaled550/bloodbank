<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;



class AuthController extends Controller
{

public function Register(RegisterRequest $request)
             {
  // التحقق من صحة البيانات
  $validatedData = $request->validated();
  $validatedData['password'] = bcrypt($validatedData['password']);
  $validatedData['device_token'] = $request->device_token;
  $user = User::create($validatedData);


    // إنشاء توكن باستخدام Sanctum
    $token = $user->createToken('mobile')->plainTextToken;

    return responsejson(1, 'success', [
        'token' => $token,
        'user' => $user,
    ]);
  }


  public function Login(LoginRequest $request)
   {


    $validatedData = $request->validated();

    if (Auth::attempt(['phone' => $validatedData['phone'], 'password' => $validatedData['password']])) {
        $user = Auth::user();

if ($request->has('device_token')) {
    $user->device_token = $request->device_token;
    $user->save();

  }

        // إنشاء توكن جديد للمستخدم
        $token = $user->createToken('authToken')->plainTextToken;

        return responsejson(1, 'Login successful', [
            'token' => $token,
            'user' => $user,
        ]);



   }
   return responsejson(0, 'invalid credentials');

}

public function logout(Request $request)
{
    $request->user()->tokens()->delete(); // حذف كل التوكنات الخاصة بالمستخدم

    return responsejson(1, 'Logged out successfully');
}




public function sendResetCode(Request $request)
{
    // التحقق من صحة المدخلات
    $validator = Validator::make($request->all(), [
        'email' => 'required|email|exists:users,email'
    ]);

    if ($validator->fails()) {
        return responsejson(0, 'Invalid input', $validator->errors());
    }

    // البحث عن المستخدم عبر الإيميل
    $user = User::where('email', $request->email)->first();

    // إنشاء كود عشوائي من 6 أرقام
    $reset_code = Str::random(6);
    $reset_code = rand(100000, 999999);
    $user->reset_code = $reset_code;
    $user->save();

    // إرسال الإيميل
    Mail::raw("Your password reset code is: $reset_code", function ($message) use ($user) {
        $message->to($user->email)
                ->subject('Password Reset Code');
    });

    return responsejson(1, 'Reset code sent successfully to your email');
}



// تعيين كلمة مرور جديدة بعد إدخال الكود الصحيح
public function resetPassword(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email|exists:users,email',
        'reset_code' => 'required|digits:6',
        'password' => 'required|confirmed|min:6'
    ]);
    $user = User::where('email', $request->email)
                ->where('reset_code', $request->reset_code)
                ->first();

                if ($validator->fails()) {
                    return responsejson(0, 'Invalid reset code', $validator->errors());
                }

    $user->update([
        'password' => Hash::make($request->password),
        'reset_code' => null, // حذف الكود بعد الاستخدام
    ]);

    return response()->json(['message' => 'Password reset successfully.']);
}






    }



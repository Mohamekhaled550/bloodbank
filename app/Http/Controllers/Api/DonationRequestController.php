<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests\DonationRequestRequest;
use App\Models\DonationRequest;
use Illuminate\Http\Request;
use App\Notifications\DonationRequestCreated;
use App\Models\User;
use App\Models\Governorate;
use App\Models\City;
use Illuminate\Support\Facades\Notification; // مهم تستورده
use Illuminate\Support\Facades\Auth;

class DonationRequestController extends Controller
{
    public function store(DonationRequestRequest $request)
    {
     // ✅ تحقق من البيانات وأضف معرف المستخدم
        $validatedData = $request->validated();
        $validatedData['user_id'] = Auth::user()->id;

    // ✅ إنشاء الطلب وتحميل العلاقات
        $donationRequest = DonationRequest::create($validatedData);
        $donationRequest->load('city.governorate', 'bloodType');
        $donationGovernorateId = optional($donationRequest->city)->governorate_id;


        if (!$donationGovernorateId) {
            return response()->json([
                'status' => 0,
                'message' => 'Governorate not found for this donation request.'
            ], 400);
        }


        // جلب المستخدمين المطابقين لإعدادات الإشعار (فصيلة الدم + المحافظة)
        $receivers = User::whereHas('notificationSettings', function ($query) use ($donationRequest, $donationGovernorateId) {
            $query->where('bloodtype_id', $donationRequest->bloodtype_id)
                  ->where('governorate_id', $donationGovernorateId);
        })
        ->whereNotNull('device_token')
        ->get();



 // 🟨 إرسال الإشعار
 Notification::send($receivers, new DonationRequestCreated($donationRequest));
 return response()->json([
     'status' => 1,
     'message' => 'Donation request created, notifications sent and stored.'
 ]);
    }
}

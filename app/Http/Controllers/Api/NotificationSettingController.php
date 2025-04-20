<?php


namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\NotificationSetting;
use Illuminate\Http\Request;

class NotificationSettingController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'bloodtypes' => 'required|array',
            'bloodtypes.*' => 'exists:bloodtypes,id',
            'governorates' => 'required|array',
            'governorates.*' => 'exists:governorates,id',
        ]);

        // نحذف الإعدادات القديمة
        NotificationSetting::where('user_id', auth()->id())->delete();

        // إضافة الإعدادات الجديدة
        foreach ($request->bloodtypes as $bloodtypeId) {
            foreach ($request->governorates as $governorateId) {
                NotificationSetting::create([
                    'user_id' => auth()->id(),
                    'bloodtype_id' => $bloodtypeId,
                    'governorate_id' => $governorateId,
                ]);
            }
        }

        // عرض الرسالة بعد الحفظ
        return response()->json(['message' => 'تم حفظ إعدادات الإشعارات بنجاح']);
    }


}


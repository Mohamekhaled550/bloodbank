<?php

namespace App\Console\Commands;

use Filament\Commands\MakeFilamentUser;
use Illuminate\Console\Command;

class MakeFilamentUserWithCity extends Command
{
    protected $signature = 'make:filament-user-with-city';

    protected $description = 'Create a new Filament user with city_id';

    public function handle()
    {  $name = $this->ask('Enter the name:'); // إذا كنت تستخدم ask للحصول على المدخلات
        $email = $this->ask('Enter the email:');
        $password = $this->secret('Enter the password:');
        $cityId = $this->ask('Enter the city ID:');
        $phone = $this->ask('Enter the phone number:'); // الحصول على رقم الهاتف
        $dLDate = $this->ask('Enter the date of employment (YYYY-MM-DD):'); // الحصول على تاريخ التوظيف
        $birthDate = $this->ask('Enter the birth date (YYYY-MM-DD):'); // الحصول على تاريخ الميلاد
        $bloodTypeId = $this->ask('Enter the blood type ID:'); // الحصول على فصيلة الدم
        $deviceToken = $this->ask('Enter the device token (optional):'); // الحصول على device_token (إذا كان موجودًا)

        \App\Models\User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password), // تشفير كلمة المرور
            'city_id' => $cityId,  // إضافة city_id
            'phone' => $phone,  // إضافة رقم الهاتف
            'd_l_d' => $dLDate,  // إضافة تاريخ التوظيف
            'birth_date' => $birthDate,  // إضافة تاريخ الميلاد
            'bloodtype_id' => $bloodTypeId, // إضافة فصيلة الدم
            'is_active' => true,  // إضافة حالة النشاط (مثلاً تفعيل الحساب بشكل افتراضي)
            'device_token' => $deviceToken, // إضافة الـ device_token (إذا كان مطلوبًا)
        ]);
        $this->info('Filament user created successfully!');
    }
}

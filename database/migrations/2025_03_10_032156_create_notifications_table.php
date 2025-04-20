<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // حذف الجدول القديم إذا كان موجودًا

        // إعادة إنشاء الجدول مع الأعمدة الجديدة
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id'); // معرف فريد
            $table->string('type'); // نوع الإشعار
            $table->json('data'); // البيانات المخزنة بصيغة JSON
            $table->timestamp('read_at')->nullable(); // تاريخ القراءة (اختياري)
            $table->unsignedBigInteger('notifiable_id'); // ID الكائن المتعلق
            $table->string('notifiable_type'); // نوع الكائن المتعلق
            $table->timestamps(); // التاريخ والوقت
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // حذف الجدول في حالة الرجوع إلى المهاجرة
        Schema::dropIfExists('notifications');
    }
};

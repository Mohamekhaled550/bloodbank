<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodtypeUserNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('bloodtype_id')->constrained()->onDelete('cascade');
            $table->foreignId('governorate_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['user_id', 'bloodtype_id', 'governorate_id']); // عشان نفس الإعداد متكررش
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bloodtype_user_notification');
    }
}

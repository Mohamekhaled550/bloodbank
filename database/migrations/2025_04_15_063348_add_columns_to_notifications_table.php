<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notifications', function (Blueprint $table) {
            // إضافة الأعمدة المفقودة
            $table->string('type')->nullable(); // type
            $table->json('data')->nullable(); // data
            $table->timestamp('read_at')->nullable(); // read_at
            $table->unsignedBigInteger('notifiable_id')->nullable(); // notifiable_id
            $table->string('notifiable_type')->nullable(); // notifiable_type
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notifications', function (Blueprint $table) {
            // إزالة الأعمدة في حالة التراجع
            $table->dropColumn(['type', 'data', 'read_at', 'notifiable_id', 'notifiable_type']);
        });
    }
}

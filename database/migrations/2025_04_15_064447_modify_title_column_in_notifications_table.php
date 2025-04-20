<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyTitleColumnInNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notifications', function (Blueprint $table) {
            // حذف العمود
            $table->dropColumn('title');
        });

        // إعادة إضافة العمود 'title' كـ nullable
        Schema::table('notifications', function (Blueprint $table) {
            $table->string('title')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // إعادة العمود 'title' مع جعلها غير nullable
        Schema::table('notifications', function (Blueprint $table) {
            $table->string('title')->nullable(false);
        });
    }
}

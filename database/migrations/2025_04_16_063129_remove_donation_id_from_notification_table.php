<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveDonationIdFromNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropForeign(['donationrequest_id']); // لو فيه foreign key
            $table->dropColumn('donationrequest_id');
        });
    }

    public function down()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->foreignId('donationrequest_id')->constrained()->onDelete('cascade');
        });
    }
}

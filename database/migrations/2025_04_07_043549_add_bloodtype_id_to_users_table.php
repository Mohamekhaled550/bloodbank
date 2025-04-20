<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBloodtypeIdToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('bloodtype_id')->nullable()->after('id');

            $table->foreign('bloodtype_id')->references('id')->on('bloodtypes')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['bloodtype_id']);
            $table->dropColumn('bloodtype_id');
        });
    }

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveBloodTypeFromUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('blood_type');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('blood_type', ['O-', 'O+', 'B-', 'B+', 'A-', 'A+', 'AB-', 'AB+'])->nullable();
        });
    }

}

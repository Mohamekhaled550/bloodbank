<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropBloodTypeUserTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('blood_type_user');
    }

    public function down()
    {
        Schema::create('blood_type_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('bloodtype_id');
            $table->timestamps();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
 {

	public function up()
	{
		Schema::create('donationrequests', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->unsignedBigInteger('user_id')->unsigned();
			$table->string('patient_name');
			$table->integer('patient_age');
			$table->unsignedBigInteger('bloodtype_id')->unsigned();
			$table->integer('bags_num');
			$table->string('hospital_name');
			$table->string('hospital_address');
			$table->unsignedBigInteger('city_id')->unsigned();
			$table->string('phone');
			$table->text('notes');
			$table->double('latitude', 10,8);
			$table->double('longitude', 10,8);
		});
	}

	public function down()
	{
		Schema::drop('donationrequests');
	}
};

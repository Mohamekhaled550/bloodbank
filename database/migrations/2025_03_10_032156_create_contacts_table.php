<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
 {

	public function up()
	{
		Schema::create('contacts', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->unsignedBigInteger('user_id')->unsigned();
			$table->string('title');
			$table->text('message');
		});
	}

	public function down()
	{
		Schema::drop('contacts');
	}
}
;

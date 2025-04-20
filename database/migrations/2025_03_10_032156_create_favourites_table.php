<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
 {

	public function up()
	{
		Schema::create('favourites', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->unsignedBigInteger('post_id')->unsigned();
			$table->unsignedBigInteger('user_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('favourites');
	}
}
;

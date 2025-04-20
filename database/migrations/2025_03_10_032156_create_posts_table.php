<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
 {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->unsignedBigInteger('user_id')->unsigned();
			$table->string('title');
			$table->text('content');
			$table->date('publish_date');
			$table->unsignedBigInteger('category_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
};

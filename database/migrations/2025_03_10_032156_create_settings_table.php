<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
 {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string('phone');
			$table->string('email');
			$table->string('about_app');
			$table->string('facebook_url');
			$table->string('twitter_url');
			$table->string('youtube_url');
			$table->string('instagram_url');
			$table->string('google_url');
			$table->string('whatsapp');
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
};

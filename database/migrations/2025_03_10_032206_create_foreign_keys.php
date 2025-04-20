<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
 {

	public function up()
	{
		Schema::table('posts', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		
		Schema::table('cities', function(Blueprint $table) {
			$table->foreign('governorate_id')->references('id')->on('governorates')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('donationrequests', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('donationrequests', function(Blueprint $table) {
			$table->foreign('bloodtype_id')->references('id')->on('bloodtypes')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('donationrequests', function(Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('contacts', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('reports', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('notifications', function(Blueprint $table) {
			$table->foreign('donationrequest_id')->references('id')->on('donationrequests')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('favourites', function(Blueprint $table) {
			$table->foreign('post_id')->references('id')->on('posts')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('favourites', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('posts', function(Blueprint $table) {
			$table->dropForeign('posts_user_id_foreign');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->dropForeign('posts_category_id_foreign');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_city_id_foreign');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_bloodtype_id_foreign');
		});
		Schema::table('cities', function(Blueprint $table) {
			$table->dropForeign('cities_governorate_id_foreign');
		});
		Schema::table('donationrequests', function(Blueprint $table) {
			$table->dropForeign('donationrequests_user_id_foreign');
		});
		Schema::table('donationrequests', function(Blueprint $table) {
			$table->dropForeign('donationrequests_bloodtype_id_foreign');
		});
		Schema::table('donationrequests', function(Blueprint $table) {
			$table->dropForeign('donationrequests_city_id_foreign');
		});
		Schema::table('contacts', function(Blueprint $table) {
			$table->dropForeign('contacts_user_id_foreign');
		});
		Schema::table('reports', function(Blueprint $table) {
			$table->dropForeign('reports_user_id_foreign');
		});
		Schema::table('notifications', function(Blueprint $table) {
			$table->dropForeign('notifications_donationrequest_id_foreign');
		});
		Schema::table('favourites', function(Blueprint $table) {
			$table->dropForeign('favourites_post_id_foreign');
		});
		Schema::table('favourites', function(Blueprint $table) {
			$table->dropForeign('favourites_user_id_foreign');
		});
	}
}
;

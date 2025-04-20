<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD
return new class extends Migration
=======
class CreateUsersTable extends Migration
>>>>>>> b541f1feb320e7ca57cfc9851f3ac4a74d946dc2
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
<<<<<<< HEAD
	{
		Schema::create('users', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string('name');
			$table->string('email');
			$table->date('birth_date');
			$table->unsignedBigInteger('city_id')->unsigned();
			$table->string('phone');
			$table->time('d_l_d');
			$table->string('password');
            $table->enum('blood_type', ['O-', 'O+', 'B-', 'B+', 'A-', 'A+', 'AB-', 'AB+'])->nullable();
            $table->boolean('is_active')->default(true); // إضافة العمود من جديد بالقيمة الافتراضية
            $table->string('reset_code')->nullable();
            $table->string('device_token')->nullable();
		});
	}
=======
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

>>>>>>> b541f1feb320e7ca57cfc9851f3ac4a74d946dc2
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
<<<<<<< HEAD
;
=======
>>>>>>> b541f1feb320e7ca57cfc9851f3ac4a74d946dc2

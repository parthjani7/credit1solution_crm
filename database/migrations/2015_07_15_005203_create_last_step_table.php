<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {


	public function up()
	{
		Schema::create('last_step', function(Blueprint $table)
		{
			$table->unsignedBigInteger('user_id')->index();
			$table->string("driving_license_number");
			$table->string("driving_license_state",100);
			$table->string("social_security_number");
			$table->date("birthdate");
			$table->timestamps();

            $table->foreign('user_id')->references('id')->on('profiles')->onDelete('cascade');
		});
	}


	public function down()
	{
		Schema::dropIfExists('last_step');
	}

};

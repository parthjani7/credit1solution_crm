<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {


	public function up()
	{
		Schema::create('email_details', function(Blueprint $table)
		{
			$table->id();
			$table->string("to_from");
			$table->string("type",50);
			$table->string("subject");
			$table->text("message");
			$table->tinyInteger("include_data");
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('email_details');
	}

};

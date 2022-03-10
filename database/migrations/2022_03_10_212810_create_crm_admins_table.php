<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_admins', function (Blueprint $table) {
            $table->id();
			$table->string("token",45)->nullable();
			$table->string("username");
			$table->string("password");
			$table->string("email")->unique();
			$table->integer("user_state",1);
            $table->string("status",100)->nullable();
            $table->string('role', 50);
            $table->integer("login_attemps")->default(0);

			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crm_admins');
    }
};

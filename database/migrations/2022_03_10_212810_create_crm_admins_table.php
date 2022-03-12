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
            $table->string("username")->nullable();
            $table->string("password")->nullable();
            $table->string("email")->unique();
            $table->tinyInteger("user_state")->default(0);
            $table->string('token')->nullable();
            $table->string('status', 100)->nullable();
            $table->string('role', 50);
            $table->tinyInteger("login_attemps")->default(0);

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

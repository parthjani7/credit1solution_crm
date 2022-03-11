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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('_token')->nullable();
            $table->string('email')->nullable();
            $table->string('choose_service')->nullable();
            $table->string('card_number');
            $table->string('month');
            $table->string('year');
            $table->string('full_name');
            $table->string('cvv');
            $table->string('street_address');
            $table->string('primary_zip_code');
            $table->string('bank_name');
            $table->string('routing_number');
            $table->string('account_number');
            $table->string('contact_information');
            $table->string('secondary_zip_code');
            $table->string('billing_address');
            $table->string("account_type",100)->default("Checking Account");
            $table->string("package",100);
            $table->date('package_start');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};

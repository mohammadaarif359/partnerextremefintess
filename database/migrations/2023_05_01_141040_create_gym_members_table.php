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
        Schema::create('gym_members', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('partner_id');
			$table->string('name');
			$table->string('email');
			$table->string('mobile');
			$table->integer('age');
			$table->date('joining_date');
			$table->string('blood_group');
			$table->longText('address');
			$table->string('profile_photo')->nullable();
			$table->integer('other_mobile')->nullable();
			$table->date('last_fee_month')->nullable();
			$table->date('next_fee_month')->nullable();
			$table->boolean('status')->default(1);
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
        Schema::dropIfExists('gym_members');
    }
};

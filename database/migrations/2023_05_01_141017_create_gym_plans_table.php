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
        Schema::create('gym_plans', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('partner_id');
			$table->longText('title');
			$table->integer('duration')->comment('in month like 3,6,12');
			$table->double('amount');
			$table->longText('description')->nullable();
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
        Schema::dropIfExists('gym_plans');
    }
};

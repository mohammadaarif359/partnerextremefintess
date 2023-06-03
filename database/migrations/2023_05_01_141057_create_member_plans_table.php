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
        Schema::create('member_plans', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('plan_id');
			$table->bigInteger('member_id');
			$table->double('amount');
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
			$table->longText('remark')->nullable();
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
        Schema::dropIfExists('member_plans');
    }
};

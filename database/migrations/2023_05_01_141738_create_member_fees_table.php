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
        Schema::create('member_fees', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('member_id');
			$table->bigInteger('member_plan_id');
			$table->double('amount');
			$table->date('fee_month');
			$table->dateTime('recieved_at');
			$table->string('recieved_by');
			$table->longText('remark')->nullable();
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
        Schema::dropIfExists('member_fees');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('status');
            $table->date('startDate');
            $table->date('endDate');
            $table->integer('maxCoverage');
            $table->integer('premium');

            $table->string('gender');
            $table->string('fullName');
            $table->date('birthdate');
            $table->string('phone');
            $table->string('address');

            $table->foreignId('policy_id');
            $table->foreignId('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}

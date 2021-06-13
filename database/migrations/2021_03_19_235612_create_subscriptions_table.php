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
            $table->string('status');
            $table->date('startDate')->nullable(true);
            $table->date('endDate')->nullable(true);
            $table->integer('maxCoverage');
            $table->string('policy_name');
            $table->integer('premium');

            $table->string('gender');
            $table->string('fullName');
            $table->date('birthdate');
            $table->string('phone');
            $table->string('address');
            $table->string('claimType');

            $table->foreignId('policy_id')->constrained('policies');
            $table->foreignId('customer_id')->constrained('users');
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
        Schema::dropIfExists('subscriptions');
    }
}

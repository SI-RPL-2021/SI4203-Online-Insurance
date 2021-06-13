<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->string('status');
            $table->string('paymentMethod')->nullable(true);
            $table->date('paymentDate')->nullable(true);
            $table->string('customerName');
            $table->foreignId('policy_id')->constrained('policies');
            $table->foreignId('customer_id')->constrained('users');
            $table->foreignId('subscription_id')->constrained('subscriptions');
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
        Schema::dropIfExists('transactions');
    }
}

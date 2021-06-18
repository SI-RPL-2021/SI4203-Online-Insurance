<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("claims", function (Blueprint $table) {
            $table->id();
            $table->string("status");
            $table->integer("coverage");
            $table->string("claimantName");
            $table->string("diagnosis");
            $table->date("hospitalizeDate");
            $table->integer("hospitalizeDuration");
            $table->string("medcareName");
            $table->string("claimType");
            $table->string("dokumen");
            $table->foreignId("subscription_id")->constrained('subscriptions');
            $table->foreignId("customer_id")->constrained('users');
            $table->foreignId("policy_id")->constrained('policies');
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
        Schema::dropIfExists("claims");
    }
}

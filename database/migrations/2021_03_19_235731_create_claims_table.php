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
            $table->timestamps();
            $table->string("status");
            $table->string("note");
            $table->integer("coverage");
            $table->string("claimantName");
            $table->string("diagnosis");
            $table->date("hospitalizeDate");
            $table->integer("hospitalizeDuration");
            $table->string("medcareName");
            $table->string("claimType");
            $table->foreignId("subscription_id");
            $table->foreignId("customer_id");
            $table->foreignId("policy_id");
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

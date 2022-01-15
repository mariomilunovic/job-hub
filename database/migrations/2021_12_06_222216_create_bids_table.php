<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->id();
            $table->decimal('offer',10,2 );
            $table->tinyInteger('days');
            $table->text('message');
            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('finished_at')->nullable();

            $table->timestamps();

            $table->unsignedBigInteger('bidstatus_id');
            $table->foreign('bidstatus_id')->references('id')->on('bid_statuses');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('job_id');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bids');
    }
}

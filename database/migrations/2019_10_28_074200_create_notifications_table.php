<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_id');
            $table->string('app_id')->nullable();
            $table->string('user_id');
            $table->string('name');
            $table->string('subject');
            $table->string('message_type');
            $table->string('type');
            $table->string('message')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('message_status')->default('0');
            $table->string('from')->nullable();
            $table->string('to')->nullable();
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
        Schema::dropIfExists('notifications');
    }
}

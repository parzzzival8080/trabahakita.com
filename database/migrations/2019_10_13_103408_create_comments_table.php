<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_id');
            $table->string('post_id');
            $table->string('user_id');
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('contact_fb');
            $table->string('contact_twitter');
            $table->string('contact_email');
            $table->string('message');
            $table->string('hired_status')->default('0');
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
        Schema::dropIfExists('comments');
    }
}

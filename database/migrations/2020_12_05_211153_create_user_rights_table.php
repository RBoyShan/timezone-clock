<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRightsTable extends Migration
{
    public function up()
    {
        Schema::create('user_rights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('model', 20);
            $table->string('right', 10);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_rights');
    }
}
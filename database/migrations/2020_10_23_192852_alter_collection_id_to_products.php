<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCollectionIdToProducts extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('collection_id')->nullable();

            $table->foreign('collection_id')
                ->references('id')
                ->on('collections');
        });
    }


    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('collection_id');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvincesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->integer('country_id')->unsigned()->index();
            $table->timestamps();
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->foreign('province_id')
                    ->references('id')
                    ->on('provinces')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->dropForeign(['province_id']);
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->dropIndex(['province_id']);
        });

        Schema::dropIfExists('provinces');
    }
}

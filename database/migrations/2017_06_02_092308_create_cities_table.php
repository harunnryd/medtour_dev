<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->integer('province_id')->unsigned()->index();
            $table->timestamps();
        });

        Schema::table('entities', function (Blueprint $table) {
            $table->foreign('city_id')
                    ->references('id')->on('cities')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entities', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
        });

        Schema::table('entities', function (Blueprint $table) {
            $table->dropIndex(['city_id']);
        });

        Schema::dropIfExists('cities');
    }
}

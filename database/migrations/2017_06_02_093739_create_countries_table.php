<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->timestamps();
        });

        Schema::table('provinces', function (Blueprint $table) {
            $table->foreign('country_id')
                    ->references('id')
                    ->on('countries')
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
        Schema::table('provinces', function (Blueprint $table) {
            $table->dropForeign(['country_id']);
        });

        Schema::table('provinces', function (Blueprint $table) {
            $table->dropIndex(['country_id']);
        });
        Schema::dropIfExists('countries');
    }
}

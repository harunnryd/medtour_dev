<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->integer('hospital_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('hospital_id')
                    ->references('id')
                    ->on('hospitals')
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
        Schema::table('facilities', function (Blueprint $table) {
            $table->dropForeign(['hospital_id']);
        });

        Schema::table('facilities', function (Blueprint $table) {
            $table->dropIndex(['hospital_id']);
        });

        Schema::dropIfExists('facilities');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('slug')->nullable();
            $table->bigInteger('beds');
            $table->bigInteger('inpatients');
            $table->bigInteger('outpatients');
            $table->integer('entity_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('entity_id')
                    ->references('id')
                    ->on('entities')
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
        Schema::table('hospitals', function (Blueprint $table) {
            $table->dropForeign(['entity_id']);
        });

        Schema::table('hospitals', function (Blueprint $table) {
            $table->dropIndex(['entity_id']);
        });

        Schema::dropIfExists('hospitals');
    }
}

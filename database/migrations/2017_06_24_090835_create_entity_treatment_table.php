<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntityTreatmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity_treatment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('entity_id')->unsigned()->index();
            $table->integer('treatment_id')->unsigned()->index();
            $table->bigInteger('price')->nullable();
            $table->text('desc')->nullable();

            $table->timestamps();

            $table->foreign('entity_id')
                    ->references('id')
                    ->on('entities')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('treatment_id')
                    ->references('id')
                    ->on('treatments')
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
        Schema::table('entity_treatment', function (Blueprint $table) {
            $table->dropForeign(['entity_id']);
            $table->dropForeign(['treatment_id']);
        });

        Schema::table('entity_treatment', function (Blueprint $table) {
            $table->dropIndex(['entity_id']);
            $table->dropIndex(['treatment_id']);
        });

        Schema::dropIfExists('entity_treatment');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePracticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id')->unsigned()->index();
            $table->integer('hospital_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('doctor_id')
                    ->references('id')
                    ->on('doctors')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

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
        Schema::table('practices', function (Blueprint $table) {
            $table->dropForeign(['doctor_id']);
            $table->dropForeign(['hospital_id']);
        });

        Schema::table('practices', function (Blueprint $table) {
            $table->dropIndex(['doctor_id']);
            $table->dropIndex(['hospital_id']);
        });

        Schema::dropIfExists('practices');
    }
}

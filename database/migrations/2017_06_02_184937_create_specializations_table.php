<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecializationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specializations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type', 60)->unique();
            $table->string('slug')->nullable();
            $table->timestamps();
        });

        Schema::create('doctor_specialization', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id')->unsigned()->index();
            $table->integer('specialization_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('doctor_id')
                    ->references('id')
                    ->on('doctors')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreign('specialization_id')
                    ->references('id')
                    ->on('specializations')
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
        Schema::table('doctor_specialization', function (Blueprint $table) {
            $table->dropForeign(['doctor_id']);
            $table->dropForeign(['specialization_id']);
        });

        Schema::table('doctor_specialization', function (Blueprint $table) {
            $table->dropIndex(['doctor_id']);
            $table->dropIndex(['specialization_id']);
        });

        Schema::dropIfExists('doctor_specialization');

        Schema::dropIfExists('specializations');
    }
}

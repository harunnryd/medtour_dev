<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('spoken', 15)->unique();
            $table->string('slug')->nullable();
            $table->timestamps();
        });

        Schema::create('doctor_language', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id')->unsigned()->index();
            $table->integer('language_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('doctor_id')
                    ->references('id')
                    ->on('doctors')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('language_id')
                    ->references('id')
                    ->on('languages')
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
        Schema::table('doctor_language', function (Blueprint $table) {
            $table->dropForeign(['doctor_id']);
            $table->dropForeign(['language_id']);
        });

        Schema::table('doctor_language', function (Blueprint $table) {
            $table->dropIndex(['doctor_id']);
            $table->dropIndex(['language_id']);
        });

        Schema::dropIfExists('doctor_language');

        Schema::dropIfExists('languages');
    }
}

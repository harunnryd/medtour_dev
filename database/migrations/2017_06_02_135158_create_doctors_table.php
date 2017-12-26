<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 35);
            $table->string('slug')->nullable();
            $table->enum('gender', ['l', 'p']);
            $table->integer('entity_id')->unsigned()->index()->nullable();
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
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropForeign(['entity_id']);
        });

        Schema::table('doctors', function (Blueprint $table) {
            $table->dropIndex(['entity_id']);
        });

        Schema::dropIfExists('doctors');
    }
}

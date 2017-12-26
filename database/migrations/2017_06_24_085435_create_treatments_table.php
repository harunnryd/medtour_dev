<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('specialization_id')->unsigned()->index();
            $table->string('name')->unique();
            $table->string('slug')->nullable();
            $table->timestamps();

            // $table->foreign('specialization_id')
            //         ->references('id')
            //         ->on('specializations')
            //         ->onDelete('cascade')
            //         ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('treatments', function (Blueprint $table) {
        //     $table->dropForeign(['specialization_id']);
        // });

        // Schema::table('treatments', function (Blueprint $table) {
        //     $table->dropIndex(['specialization_id']);
        // });

        Schema::dropIfExists('treatments');
    }
}

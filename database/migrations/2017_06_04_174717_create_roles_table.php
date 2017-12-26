<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('has', 6)->default('user');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('role_id')
                    ->references('id')
                    ->on('roles')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });

        Schema::table('admins', function (Blueprint $table) {
            $table->foreign('role_id')
                    ->references('id')
                    ->on('roles')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });

        Schema::table('access_rights', function (Blueprint $table) {
            $table->foreign('role_id')
                    ->references('id')
                    ->on('roles')
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

        Schema::table('access_rights', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
        });

        Schema::table('access_rights', function (Blueprint $table) {
            $table->dropIndex(['role_id']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['role_id']);
        });

        Schema::table('admins', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
        });

        Schema::table('admins', function (Blueprint $table) {
            $table->dropIndex(['role_id']);
        });

        Schema::dropIfExists('roles');
    }
}

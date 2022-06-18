<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('logs', function (Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('empleados');
			$table->foreign('estatus_id')->references('id')->on('catalogos');
		});
        Schema::table('catalogos', function (Blueprint $table) {
			$table->foreign('tipo_id')->references('id')->on('tipos');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('logs', function (Blueprint $table) {
			$table->dropForeign(['user_id']);
			$table->dropForeign(['estatus_id']);
		});
        Schema::table('catalogos', function (Blueprint $table) {
			$table->dropForeign(['tipo_id']);
		});
    }
};

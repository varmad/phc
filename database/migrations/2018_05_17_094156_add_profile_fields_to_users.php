<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfileFieldsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users', function($table) {
        $table->integer('nurse_category_id')->unsigned()->nullable();
        $table->string('nursing_home_series')->nullable();
        $table->string('mobile')->nullable();
        $table->string('address')->nullable();
        $table->string('id_proof')->nullable();
        $table->string('upload_id_proof')->nullable();
        $table->string('profile_picture')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users', function($table) {
        $table->dropColumn('nurse_category_id');
        $table->dropColumn('nursing_home_series');
        $table->dropColumn('mobile');
        $table->dropColumn('address');
        $table->dropColumn('id_proof');
        $table->dropColumn('upload_id_proof');
        $table->dropColumn('profile_picture');
      });
    }
}

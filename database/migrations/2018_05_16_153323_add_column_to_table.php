<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->integer('user_service_type');
          $table->string('username');
          $table->dateTime('last_login')->nullable();
          $table->string('last_ip');
          $table->string('display_name');
          $table->string('ban_message');
          $table->string('timezone');
          $table->string('force_password_reset');
          $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_service_type');
            $table->dropColumn('username');
            $table->dropColumn('last_login');
            $table->dropColumn('last_ip');
            $table->dropColumn('display_name');
            $table->dropColumn('ban_message');
            $table->dropColumn('timezone');
            $table->dropColumn('force_password_reset');
            $table->dropColumn('status');
        });
    }
}

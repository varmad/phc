<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeoplesTable extends Migration 
{
	public function up()
	{
		Schema::create('peoples', function(Blueprint $table) {
            $table->increments('id');
            $table->string('job_refer_id')->index();
            $table->integer('nursing_id')->index()->unsigned();
            $table->integer('staff_count')->unsigned();
            $table->integer('staff_cat_id')->unsigned();
            $table->integer('shift_id')->unsigned()->index ();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('peoples');
	}
}

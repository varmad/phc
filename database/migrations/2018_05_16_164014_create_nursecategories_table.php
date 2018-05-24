<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNurseCategoriesTable extends Migration 
{
	public function up()
	{
		Schema::create('nurse_categories', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->integer('is_active')->unsigned();
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned ();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('nurse_categories');
	}
}

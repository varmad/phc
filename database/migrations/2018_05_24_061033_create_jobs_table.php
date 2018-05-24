<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('job_reference_id');
            $table->integer('nursing_id');
            $table->integer('staff_count');
            $table->integer('nurse_category_id');
            $table->integer('shift_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('description');
            $table->string('booking_reference')->nullable();
            $table->string('status')->default('Active');
            $table->integer('is_deleted')->default(0);
            $table->integer('deleted_by')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}

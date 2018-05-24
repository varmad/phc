<?php

use Illuminate\Database\Seeder;
use App\Models\Job;

class JobsTableSeeder extends Seeder
{
    public function run()
    {
        $jobs = factory(Job::class)->times(50)->make()->each(function ($job, $index) {
            if ($index == 0) {
                // $job->field = 'value';
            }
        });

        Job::insert($jobs->toArray());
    }

}


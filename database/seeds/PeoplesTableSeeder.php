<?php

use Illuminate\Database\Seeder;
use App\Models\People;

class PeoplesTableSeeder extends Seeder
{
    public function run()
    {
        $peoples = factory(People::class)->times(50)->make()->each(function ($people, $index) {
            if ($index == 0) {
                // $people->field = 'value';
            }
        });

        People::insert($peoples->toArray());
    }

}


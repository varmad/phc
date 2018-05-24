<?php

use Illuminate\Database\Seeder;
use App\Models\NurseCategory;

class NurseCategorysTableSeeder extends Seeder
{
    public function run()
    {
        $nurse_categorys = factory(NurseCategory::class)->times(50)->make()->each(function ($nurse_category, $index) {
            if ($index == 0) {
                // $nurse_category->field = 'value';
            }
        });

        NurseCategory::insert($nurse_categorys->toArray());
    }

}


<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = ['Отдел сайтов','Отдел дизайна','Отдел юристов'];
        foreach ($groups as $group) {
           \App\Models\Group::create([
                'name' => $group
            ]);
        }
    }
}

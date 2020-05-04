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
            foreach(\App\Models\User::all() as $user) {
                \App\Models\Group::create([
                    'name' => $group,
                    'user_id' => $user->id
                ]);
            }
        }
    }
}

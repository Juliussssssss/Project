<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            foreach(\App\Models\Group::all() as $group){
                factory(\App\Models\Contact::class, 150)->create([
                    'user_id' => $group->user_id,
                    'group_id' => $group->id
                ]);
            }

    }
}

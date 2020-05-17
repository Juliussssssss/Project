<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Contact::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'middle_name' => $faker->name,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'number' => rand(1000000000, 9999999999),
        'site' => $faker->url,
        'birthday' => $faker->dateTime,
        'city' => $faker->city,
        'work' => $faker->company,
        'position' => $faker->word,
        'favorites' => $faker->boolean,
        'work_email' => $faker->companyEmail,
        'comment' => $faker->text,
        'avatar' => $faker->imageUrl(),
    ];
});

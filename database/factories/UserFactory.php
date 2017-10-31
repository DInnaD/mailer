<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];

});

$factory->define(App\Article::class, function (Faker\Generator $faker) {
	
	return [
		'user_id' => App\User::all()->random()->id,
		'title' => $faker->title,
		'body' => $faker->paragraph(random_int(3, 5))
	];
});

$factory->define(App\Profile::class, function (Faker\Generator $faker) {
	
	return [
		'user_id' => App\User::all()->random()->id,
		'name' => $faker->name,
		'welcome' => $faker->paragraph(random_int(3, 5))
	];
});

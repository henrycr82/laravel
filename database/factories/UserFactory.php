<?php

use Faker\Generator as Faker;
Use App\Group;

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
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
/*
$factory->define(App\Note::class, function ($faker) {
    return [
        //'group_id' => 1,
        'group_id' => function () {
            return factory(App\Group::class)->create()->id;
        }, 
        'title' => $faker->text,
        'body' => $faker->text,
        'important' => $faker->boolean,
    ];
});
*/

$factory->define(App\Note::class, function ($faker) {
    return [
     'group_id' => 2,
     'title' => $faker->title,
     'body' => $faker->paragraph,
     'important' => $faker->boolean,
    ];
});

<?php

use Faker\Generator as Faker;

use App\User;
use App\Task;

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

/*$factory->define(App\Task::class, function (Faker $faker) {

	$values = [
      'very important',
      'important',
      'less important',
    ];

    $k = array_rand($values);
    $v = $values[$k];

    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'priority' => $values[$k],
        'completed' => false,
        'user_id'=> ???
    ];

});*/

$factory->define(App\Task::class, function ($faker) use ($factory)  {

    $values = [
      'very important',
      'important',
      'less important',
    ];

    $k = array_rand($values);
    $v = $values[$k];

    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'priority' => $values[$k],
        'completed' => false,
        'user_id' => $factory->create(App\User::class)->id
    ];
});

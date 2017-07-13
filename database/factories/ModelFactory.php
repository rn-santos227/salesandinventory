<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'user_level' => 'Administrator',
        'username' => 'testaccount00',
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => $faker->unique()->email,
        'password' => $password ?: $password = 'secret',
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => 'Uncategorized',
        'ref_code' => str_random(10),
        'description' => 'Default Category for Uncategorized Items.',
    ];
});


$factory->define(App\Supplier::class, function (Faker\Generator $faker) {
    return [
        'name' => 'Default',
        'ref_code' => str_random(10),
        'email' => $faker->unique()->email,
        'address' => $faker->address,
        'contact' => $faker->phonenumber,
        'description' => 'Default Supplier for self-made products.',        
    ];
});
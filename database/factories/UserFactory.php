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
    return [
        'name' => $faker->name,
        'role_id' => $faker->numberBetween(1,3),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'category_id' => $faker->numberBetween(1,10),
        'photo_id' => 1,
        'title' => $faker->sentence(7,11),
        'body' => $faker->paragraphs(str_random	(10,15),true), 
        'slug' => $faker->slug(),
    ];
});


$factory->define(App\Role::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['admin','author','agent']),
    ];
});


$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['PHP','JavaScript','Laravel','Python','jQuery']),
    ];
});

$factory->define(App\Photo::class, function (Faker $faker) {
    return [
        'file' => 'placeholder.jpg',
    ];
});

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'post_id' => $faker->numberBetween(1,10),
        'author' => $faker->name,
        'email' => $faker->safeEmail,
        'body' => $faker->paragraphs(1,true), 
        'isActive' => 1,
        'photo' => 'placeholder.jpg',
    ];
});


$factory->define(App\CommentReply::class, function (Faker $faker) {
    return [
        'author' => $faker->name,
        'email' => $faker->safeEmail,
        'body' => $faker->paragraphs(1,true), 
        'isActive' => 1,
        'photo' => 'placeholder.jpg',
    ];
});

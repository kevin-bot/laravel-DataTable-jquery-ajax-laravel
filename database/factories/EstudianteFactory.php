<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Estudiante;
use Faker\Generator as Faker;

$factory->define(Estudiante::class, function (Faker $faker) {
    return [
        //
        'codigo'=>$faker->numerify('2020######'),
        'nombres'=>$faker->firstName,
        'apellidos'=>$faker->lastName,
    ];
});

<?php

$factory->define(\Modules\Contact\Entities\ContactRequest::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'company' => $faker->company,
        'phone' => $faker->phoneNumber,
        'message' => $faker->paragraph(10),
    ];
});

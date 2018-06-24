<?php

use Faker\Generator as Faker;

// student
$factory->define(App\Models\Student::class, function (Faker $faker) {
    return [
    	'full_name' => $faker->name,
        'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'identity' => '123456789',
        'gender' => rand(0, 1),
        'phone' => $faker->phoneNumber,
        'religion' => str_random(4),
        'nation' => str_random(4),
        'email' => $faker->unique()->safeEmail,
        'home_town' => $faker->city,
        'avatar' => $faker->imageUrl($width = 640, $height = 480),    
    ];
});

// user
$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('123456'),
        'remember_token' => str_random(10),
    ];
});

// violation
$factory->define(App\Models\Violation::class, function (Faker $faker) {
    return [
        'date_violation' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'form_of_violation' => $faker->text(100),
        'discipline' => $faker->text(20),
    ];
});

// oppidan
$factory->define(App\Models\Oppidan::class, function (Faker $faker) {
    return [
		'address' => $faker->secondaryAddress,
        'street' => $faker->streetName,
        'city' => $faker->city,
    ];
});

// landlord
$factory->define(App\Models\Landlord::class, function (Faker $faker) {
    return [
        'full_name' => $faker->name,
        'phone' => $faker->phoneNumber,
    ];
});

// risident
$factory->define(App\Models\Risident::class, function (Faker $faker) {
    return [
        'address' => $faker->secondaryAddress,
        'street' => $faker->streetName,
        'city' => $faker->city,
        'postal_code' => $faker->numberBetween(1, 99),
        'home_phone' => $faker->phoneNumber,
    ];
});

// member
$factory->define(App\Models\Member::class, function (Faker $faker) {
    return [
        'union_member' => $faker->numberBetween(0, 1),
        'date_union_member' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'adherer_member' => $faker->numberBetween(0, 1),
        'date_adherer_member' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});

// course
$factory->define(App\Models\Course::class, function (Faker $faker) {
    return [
        'course_name' => str_random(6),
    ];
});

// department
$factory->define(App\Models\Department::class, function (Faker $faker) {
    return [
        'department_name' => $faker->firstName. ' '. $faker->numberBetween(1, 20),
        'degree' => str_random(4),
        'graduation_year' => $faker->year($max = 'now'),
    ];
});
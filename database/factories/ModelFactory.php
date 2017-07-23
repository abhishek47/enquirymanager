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
$factory->define(App\Models\Enquiry::class, function (Faker\Generator $faker) {
     
    $user = \DB::table('users')
                  ->where('email', 'shivangauto@gmail.com')
                  ->first();



    $company_id = \DB::table('companies')->where('user_id', $user->id)->select('id')->first()->id; 
            

	$vehicles_ids = \DB::table('vehicles')
	                    ->where('company_id', $company_id)
	                    ->select('id')->get()->toArray();



    $vehicle_id = $faker->randomElement($vehicles_ids)->id;



    $buy_date = $faker->date($format = 'Y-m-d', $min = 'now');

    $contact_date = $faker->date($format = 'Y-m-d', $min = 'now', $max = $buy_date );

    $vc = $faker->randomNumber(5, true);
    $rto = $faker->randomNumber(4, true);
    $ic = $faker->randomNumber(4, true);
    $hpa = $faker->randomNumber(4, true);
    $ac = $faker->randomNumber(4, true);

    $total = $vc + $rto + $ic + $hpa + $ac;

    return [
     	'user_id' => $user->id,
     	'company_id' => $company_id,
     	'vehicle_id' =>  $vehicle_id,
     	'vehicle_color' => $faker->colorName,
        'name' => $faker->name,
        'address' => $faker->address,
        'phone' => '9922367414',
        'buy_date' => $buy_date,
        'contact_date' => $contact_date,
        'occupation' => $faker->randomElement(['job','business']),
        'payment_type' => $faker->numberBetween(1, 2),
        'vehicle_cost' => $vc,
        'rto_charges' => $rto,
        'insuarance_charges' => $ic,
        'hpa_charges' => $hpa,
        'accessories' => $ac,
        'total' => $total


    ];
});

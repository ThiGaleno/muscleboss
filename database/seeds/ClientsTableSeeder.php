<?php

use Illuminate\Database\Seeder;
use App\Adress;
use App\Client;
use App\Phone;
use App\User;
use Faker\Factory as Faker;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $users = User::all();
        $i = 0;
        while ($i < 2) {
            foreach ($users as $user) {
                $adress = Adress::create([
                    'state' => $faker->stateAbbr,
                    'city' => $faker->city,
                    'street' => $faker->address,
                    'zip_code' => strval($faker->numberBetween($min = 1000000, $max = 9999999)),
                    'number' => strval($faker->randomDigit)
                ]);
                $phone = Phone::create([
                    'mobile' => strval($faker->numberBetween($min = 990000000, $max = 999999999)),
                    'landline' => strval($faker->numberBetween($min = 30000000, $max = 39999999)),
                ]);

                Client::create(
                    [
                        'name' => $faker->name,
                        'birth_date' => strval($faker->date($format = 'Y-m-d', $max = 'now')),
                        'gender' => 'male',
                        'adress_id' => $adress->id,
                        'phone_id' => $phone->id,
                        'salesman_id' => $user->id
                    ]
                );
            }
            $i++;
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Company;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach(range(1,20) as $index){
            DB::table('employees')->insert([
                'first_name'=> $faker->name,
                'last_name'=> $faker->name,
                "company" => Company::inRandomOrder()->first()->id,
                'email'=> $faker->email,
                'phone_number'=> $faker->phoneNumber(10),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}

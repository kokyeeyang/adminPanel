<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employee;
use App\Models\Company;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = EmployeeModel::class;

    public function definition()
    {
        return [
            "first_name" => $this->faker->name(),
            "last_name" => $this->faker->name(),
            "company" => Company::inRandomOrder()->first()->id,
            "email" => $this->faker->safeEmail(),
            "phone_number" => $this->faker->phoneNumber(),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
    }
}

<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        $userIds = User::all()->pluck('id');
        return [
            'user_id'      => $this->faker->randomElement($userIds),
            'email'        => $this->faker->unique()->email(),
            'name_surname' => $this->faker->text(20),
            'address'      => $this->faker->address(),
            'phone_number' => $this->faker->phoneNumber(),
            'date'         => $this->faker->dateTime()
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence();


        return [
            'name' => $name,
             'createdAt' => now(),
             'updatedAt' => now(),
             'user_id' => '2',
             'slug' => Str::slug($name, '-'),
             'lat' => $this->faker->latitude(),
             'lng' => $this->faker->longitude(),
        ];
    }



}

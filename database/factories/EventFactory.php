<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence(),
            'content'=>$this->faker->paragraph(),
            'event_date'=>now(),
            'photo'=>$this->faker->imageUrl(),
            'author_id'=>Arr::random([1,2]),
        ];
    }
}
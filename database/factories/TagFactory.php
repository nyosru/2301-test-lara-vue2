<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tag = $this->faker->company();
        return [
            'title' => $tag,
            'slug' => str_slug($tag),
        ];
    }
}

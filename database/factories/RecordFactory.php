<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tag = $this->faker->name();
        return [
            'title' => $tag,
            'slug' => str_slug($tag),
            'description' => $this->faker->text(),
            'view_all' => ( 1 === rand(1,3) )
        ];
    }
}

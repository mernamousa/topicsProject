<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TestmonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->randomElement(['merna', 'rehab', 'elen','ethar','Noha','noura']),
            'comment'=> fake()->text(),
            'jobTitle'=>fake()->randomElement(['Software Engineer', 'ICT teacher', 'Art Teacher']),
            'published'=> fake()->numberBetween(0, 1),
            'image'=>basename( fake()->image(public_path('admin/assets/images/testimonials'))),
        

        ];
    }
}

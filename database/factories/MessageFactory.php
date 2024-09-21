<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Message;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     //protected $model = Message::class;
    public function definition(): array
    {
        return [
            'senderName'=>fake()->randomElement(['merna', 'rehab', 'elen','ethar','Noha','noura']),
            'senderEmail'=>fake()->randomElement(['merna@gamil.com', 'rehab@gamil.com', 'elen@gamil.com','ethar@gamil.com','Noha@gamil.com','noura@gamil.com']),
            'message'=> fake()->text('You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first.
             You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first.Previous
             '),
            'subject'=>fake()->randomElement(['please check', 'ICT teacher', 'Art Teacher']),
            'read'=> fake()->numberBetween(0, 1),
        ];
    }
}

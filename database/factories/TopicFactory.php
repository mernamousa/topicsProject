<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */
class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


     private function generateRandomImage($path)
     {
         $files = scandir($path);
         $files = array_diff($files, array('.', '..'));
 
         return fake()->randomElement($files);
     }
    public function definition(): array
    {
        return [
            
                'topicTitle'=>fake()->randomElement(['kill bill movie', 'The Platform Movie', 'The Dark Knight','Interstellar','Leon The Professional','Wild Tales']),
                'content'=> fake()->text(),
                'NoOfViews'=> fake()->numberBetween(0, 50),
                'image' => $this->generateRandomImage(public_path('/admin/assets/images/topics')),
                'published'=> fake()->numberBetween(0, 1),
                'trending'=> fake()->numberBetween(0, 1),
                'category_id'=> fake()->numberbetween(1,2,3,4,5)
        
        ];
    }
}

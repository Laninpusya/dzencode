<?php

namespace Database\Factories;

use App\Models\MainMessage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MainMessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = MainMessage::class;

    public function definition()
    {
        return [
            'user_name' => $this->faker->userName,
            'email' => $this->faker->email,
            'url' => $this->faker->url,
            'text' => $this->faker->paragraph,
        ];
    }
}

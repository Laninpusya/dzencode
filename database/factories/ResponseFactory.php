<?php

namespace Database\Factories;

use App\Models\MainMessage;
use App\Models\Response;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Response>
 */
class ResponseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Response::class;

    protected static $mainMessageId;

    public function definition()
    {
        if (!self::$mainMessageId) {
            self::$mainMessageId = MainMessage::factory()->create()->id;
        }

        return [
            'user_name' => $this->faker->userName,
            'email' => $this->faker->email,
            'url' => $this->faker->url,
            'text' => $this->faker->paragraph,
            'parent_message_id' => self::$mainMessageId,
        ];
    }
}

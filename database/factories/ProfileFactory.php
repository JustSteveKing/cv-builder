<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'bio' => $this->faker->paragraphs(4, true),
            'user_id' => User::factory(),
        ];
    }
}

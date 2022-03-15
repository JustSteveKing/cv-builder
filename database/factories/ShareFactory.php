<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ShareFactory extends Factory
{
    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'token' => Str::random(),
            'email' => $this->faker->safeEmail(),
            'template' => 'test',
            'profile_id' => Profile::factory(),
        ];
    }
}

<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QualificationTitleFactory extends Factory
{
    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
        ];
    }
}

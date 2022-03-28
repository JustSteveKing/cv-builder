<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Institute;
use App\Models\Profile;
use App\Models\QualificationTitle;
use Illuminate\Database\Eloquent\Factories\Factory;

class QualificationFactory extends Factory
{
    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->paragraphs(3, true),
            'grade' => $this->faker->randomLetter(),
            'current' => $current = $this->faker->boolean(),
            'profile_id' => Profile::factory(),
            'qualification_title_id' => QualificationTitle::factory(),
            'institute_id' => Institute::factory(),
            'started_at' => $start = now()->subMonths($this->faker->numberBetween(1, 18)),
            'finished_at' => $current ? $start->addMonths($this->faker->numberBetween(1, 12)) : null,
        ];
    }
}

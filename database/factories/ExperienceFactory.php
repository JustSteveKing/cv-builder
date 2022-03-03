<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Company;
use App\Models\JobTitle;
use App\Models\Profile;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExperienceFactory extends Factory
{
    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->paragraphs(3, true),
            'current' => $current = $this->faker->boolean(),
            'profile_id' => Profile::factory(),
            'job_title_id' => JobTitle::factory(),
            'company_id' => Company::factory(),
            'started_at' => $start = now()->subMonths($this->faker->numberBetween(1, 18)),
            'finished_at' => $current ? $start->addMonths($this->faker->numberBetween(1, 12)) : null,
        ];
    }
}

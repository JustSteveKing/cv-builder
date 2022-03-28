<?php

declare(strict_types=1);

namespace Domains\Profile\DataObjects;

use Illuminate\Support\Carbon;
use JustSteveKing\LaravelToolkit\Contracts\DataObjectContract;

class Qualification implements DataObjectContract
{
    /**
     * @param int $profile
     * @param int $title
     * @param int $institute
     * @param Carbon $started
     * @param bool $current
     * @param Carbon|null $finished
     * @param string|null $grade
     * @param string|null $description
     */
    public function __construct(
        public readonly int $profile,
        public readonly int $title,
        public readonly int $institute,
        public readonly Carbon $started,
        public readonly bool $current,
        public readonly null|Carbon $finished,
        public readonly null|string $grade = null,
        public readonly null|string $description = null,
    ) {}

    /**
     * @return array<string,mixed>
     */
    public function toArray(): array
    {
        return [
            'profile_id' => $this->profile,
            'qualification_title_id' => $this->title,
            'institute_id' => $this->institute,
            'description' => $this->description,
            'grade' => $this->grade,
            'current' => $this->current,
            'started_at' => $this->started,
            'finished_at' => $this->finished,
        ];
    }
}

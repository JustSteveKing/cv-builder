<?php

declare(strict_types=1);

namespace Domains\View\Queries;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Collection;
use Infrastructure\View\Queries\ShareExperiencesQueryContract;

class ShareExperiencesQuery implements ShareExperiencesQueryContract
{
    /**
     * @param int $profile
     * @return Collection
     */
    public function handle(int $profile): Collection
    {
        return Experience::query()
            ->with(['jobTitle', 'company'])
            ->where('profile_id', $profile)
            ->get();
    }
}

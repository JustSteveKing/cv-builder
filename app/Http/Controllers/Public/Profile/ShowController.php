<?php

declare(strict_types=1);

namespace App\Http\Controllers\Public\Profile;

use App\Http\Controllers\Controller;
use App\Models\Share;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Infrastructure\View\Queries\ShareExperiencesQueryContract;
use Infrastructure\View\Queries\ShareProfileQueryContract;
use Infrastructure\View\Queries\ShareUserQueryContract;

class ShowController extends Controller
{
    public function __construct(
        public readonly ShareProfileQueryContract $profileQuery,
        public readonly ShareUserQueryContract $ownerQuery,
        public readonly ShareExperiencesQueryContract $experienceQuery,
    ) {}

    public function __invoke(Request $request, Share $share): View
    {
        return view("pages.shares.{$share->template}", [
            'share' => $share,
            'profile' => $this->profileQuery->handle(
                profile: $share->profile_id,
            ),
            'experiences' => $this->experienceQuery->handle(
                profile: $share->profile_id,
            ),
            'owner' => $this->ownerQuery->handle(
                profile: $share->profile_id,
            ),
        ]);
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Profile\Qualifications;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Infrastructure\Profile\Queries\UserProfileQueryContract;
use Infrastructure\Profile\Queries\ProfileQuailficationsContract;

class ShowController
{
    /**
     * @param Request $request
     * @param Authenticatable $user
     * @param UserProfileQueryContract $query
     * @param \Infrastructure\Profile\Queries\ProfileQuailficationsContract $qualificationQuery
     * @return View
     */
    public function __invoke(
        Request $request,
        Authenticatable $user,
        UserProfileQueryContract $query,
        ProfileQuailficationsContract $qualificationQuery,
    ): View {
        $profile = $query->handle(
            user: $user->id,
        );

        return view('app.profile.qualifications.show', [
            'user' => $user,
            'profile' => $profile,
            'qualifications' => $qualificationQuery->handle(
                profile: $profile->id,
            ),
        ]);
    }
}

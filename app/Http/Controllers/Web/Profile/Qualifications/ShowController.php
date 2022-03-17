<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Profile\Qualifications;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Infrastructure\Profile\Queries\UserProfileQueryContract;

class ShowController
{
    public function __invoke(
        Request $request,
        Authenticatable $user,
        UserProfileQueryContract $query,
    ): View {
        return view('app.profile.qualifications.show', [
            'user' => $user,
            'profile' => $query->handle(
                user: $user->id,
            ),
        ]);
    }
}

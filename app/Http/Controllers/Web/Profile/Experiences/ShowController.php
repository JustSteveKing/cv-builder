<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Profile\Experiences;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShowController
{
    public function __invoke(Request $request, Authenticatable $user): View
    {
        return view('app.profile.experiences.show', [
            'user' => $user->load(['profile.experiences']),
        ]);
    }
}

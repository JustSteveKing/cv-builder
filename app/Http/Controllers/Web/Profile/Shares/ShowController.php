<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Profile\Shares;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShowController
{
    public function __invoke(Request $request, Authenticatable $user): View
    {
        return view('app.profile.shares.show', [
            'shares' => $user->profile->shares,
            'profile' => $user->profile,
        ]);
    }
}

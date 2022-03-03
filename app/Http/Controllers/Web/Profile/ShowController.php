<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Profile;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShowController
{
    /**
     * @param Request $request
     * @return View
     */
    public function __invoke(Request $request): View
    {
        return view('app.profile.show', [
            'user' => User::query()->with(['profile'])->find(auth()->id()),
        ]);
    }
}

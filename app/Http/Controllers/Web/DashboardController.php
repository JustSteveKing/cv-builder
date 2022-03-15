<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController
{
    /**
     * @param Request $request
     * @param Authenticatable $user
     * @return View
     */
    public function __invoke(Request $request, Authenticatable $user): View
    {
        return view('dashboard', [
            'user' => $user,
        ]);
    }
}

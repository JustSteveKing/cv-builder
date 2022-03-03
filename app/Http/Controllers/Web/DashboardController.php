<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController
{
    /**
     * @param Request $request
     * @return View
     */
    public function __invoke(Request $request): View
    {
        return view('dashboard', [
            'user' => auth()->user(),
        ]);
    }
}

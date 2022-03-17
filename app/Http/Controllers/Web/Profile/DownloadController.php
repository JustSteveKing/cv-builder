<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Profile;

use App\Models\Share;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;

class DownloadController
{
    public function __invoke(Request $request)
    {
        $share = Share::query()->inRandomOrder()->first();

        $path = "{$share->token}-test.pdf";

        Browsershot::url(
            url: route('view:share', $share->token),
        )->setNodeBinary(
                nodeBinary: '/usr/bin/node',
            )->setScreenshotType(
                type: 'pdf',
                quality: 100,
            )->save(
                targetPath: storage_path(
                    path: $path
                ),
            );

        return response()->file(
            file: storage_path('$path'),
        );
    }
}

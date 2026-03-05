<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;


class UserUploadController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return [
            'file' => [
                'required',
                File::types(['png', 'jpg', 'jpeg', 'webp', 'avif'])
                    ->max(5 * 1024),
            ]
        ];
    }
}

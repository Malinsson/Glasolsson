<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class UploadController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        Gate::authorize('upload-files');

        $file = $request->file('file');
        $name = $file->hashName();

        $upload = Storage::put("products/{$name}", $file);

        Media::query()->create(
            attributes: [
                'name' => "{$name}",
                'file_name' => $file->getClientOriginalName(),
                'mime_type' => $file->getClientMimeType(),
                'path' => "avatars/{$name}",
                'disk' => config('app.uploads.disk'),
                'file_hash' => hash_file(
                    config('app.uploads.hash'),
                    storage_path(
                        path: "products/{$name}",
                    ),
                ),
                'collection' => $request->input('collection'),
                'size' => $file->getSize(),
            ],
        );

        return redirect()->back();
    }
}

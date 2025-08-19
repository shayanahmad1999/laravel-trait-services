<?php

namespace App\Trait;

use Illuminate\Http\Request;

trait ImageUploadTrait
{
    public function upload(Request $request, string $fieldName = 'image', string $directory = 'images'): ?string
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);

            if (!$file->isValid()) {
                session()->flash('error', 'Invalid image!');
                return redirect()->back();
            }

            return $file->store($directory, 'public');
        }

        return null;
    }
}

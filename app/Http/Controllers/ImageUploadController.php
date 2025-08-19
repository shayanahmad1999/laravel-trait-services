<?php

namespace App\Http\Controllers;

use App\Trait\ImageUploadTrait;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    use ImageUploadTrait;

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $imagePath = $this->upload($request, 'image', 'sample');

        if ($imagePath) {
            return redirect()->back()->with('success', 'Image uploaded successfully!');
        }

        return redirect()->back()->with('error', 'Image upload failed!');
    }
}

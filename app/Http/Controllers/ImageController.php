<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        try {
        // Validate the request
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the uploaded file
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);

            // Save image path to database
            Image::create([
                'image_path' => 'images/' . $filename,
            ]);

            return response()->json(['message' => 'Image uploaded successfully'], 201);
        }

        return response()->json(['message' => 'No image provided'], 400);
    }
    catch (\Exception $e) {
        \Log::error($e->getMessage());
        return response()->json(['message' => 'Server error'], 500);
    }
    }
}


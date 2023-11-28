<?php

namespace App\Http\Controllers;
use App\Models\Imagedata;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    //
    public function uploadImage(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Get the contents of the image file
        $imageData = file_get_contents($request->file('image')->getRealPath());

        // Save the image data to the database
        $image = Imagedata::create(['image_data' => $imageData]);

        return response()->json(['message' => 'Image uploaded successfully', 'image' => $image]);
    }
}

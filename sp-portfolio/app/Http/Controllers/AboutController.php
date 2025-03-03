<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    public function storeAbout(Request $request)
    {
        // dd($request->all());
        // Validate the request
        $validator = Validator::make($request->all(), [
            'quote' => 'sometimes', // Validate only if present
            'description' => 'sometimes', // Validate only if present
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048', // Optional, but must be valid if provided
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $uploadPath = public_path('uploads');

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $about = About::first();

        $imagePath = $about ? $about->image : null;
        if ($request->hasFile('image')) {
            if (!empty($imagePath) && file_exists(public_path($imagePath))) {
                unlink(public_path($imagePath));
            }
            $imageFile = $request->file('image');
            $imageName = time() . '_image.' . $imageFile->getClientOriginalExtension();
            $imageFile->move($uploadPath, $imageName);
            $imagePath = 'uploads/' . $imageName;
        }

        if ($about) {
            $about->update([
                'quote' => $request->quote,
                'description' => $request->description,
                'image' => $imagePath,
            ]);
        } else {
            About::create([
                'quote' => $request->quote,
                'description' => $request->description,
                'image' => $imagePath,
            ]);
        }

        return response()->json([
            'message' => 'About section updated successfully',
        ]);
    }

    public function getAbout()
    {
        $about = About::first();
        return response()->json([
            'data' => $about,
        ]);
    }
}

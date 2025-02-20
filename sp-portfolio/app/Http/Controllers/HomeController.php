<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Correct namespace for Laravel Request
use App\Models\Home;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function storeHome(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'logo' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Define folder path inside the public directory
        $uploadPath = public_path('uploads');

        // Ensure the folder exists
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Fetch the existing home record (assuming there is only one)
        $home = Home::first();

        // Handle logo upload
        $logoPath = $home ? $home->logo : null;
        if ($request->hasFile('logo')) {
            if (!empty($logoPath) && file_exists(public_path($logoPath))) {
                unlink(public_path($logoPath));
            }
            $logoFile = $request->file('logo');
            $logoName = time() . '_logo.' . $logoFile->getClientOriginalExtension();
            $logoFile->move($uploadPath, $logoName);
            $logoPath = 'uploads/' . $logoName;
        }

        // Handle image upload
        $imagePath = $home ? $home->image : null;
        if ($request->hasFile('image')) {
            if (!empty($imagePath) && file_exists(public_path($imagePath))) {
                unlink(public_path($imagePath));
            }
            $imageFile = $request->file('image');
            $imageName = time() . '_image.' . $imageFile->getClientOriginalExtension();
            $imageFile->move($uploadPath, $imageName);
            $imagePath = 'uploads/' . $imageName;
        }

        // Update or create home record
        if ($home) {
            $home->update([
                'logo' => $logoPath,
                'image' => $imagePath,
            ]);
        } else {
            $home = Home::create([
                'logo' => $logoPath,
                'image' => $imagePath,
            ]);
        }

        return response()->json([
            'message' => 'Home updated successfully',
            'data' => [
                'id' => $home->id,
                'logo' => url($logoPath),
                'image' => url($imagePath),
            ],
        ], 201);
    }


    public function getHome()
    {
        // Fetch all home records
        $homes = Home::all();

        // Format the response
        return response()->json([
            'message' => 'Home records retrieved successfully',
            'data' => $homes->map(function ($home) {
                return [
                    'id' => $home->id,
                    'logo' => $home->logo ? url($home->logo) : null,
                    'image' => $home->image ? url($home->image) : null,
                    'created_at' => $home->created_at,
                    'updated_at' => $home->updated_at,
                ];
            }),
        ], 200);
    }
}

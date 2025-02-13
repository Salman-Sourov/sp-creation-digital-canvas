<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\RegisterRequest;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['Login', 'storeUser']]);
    }

    public function Login(Request $request){

    	try{

    		if (Auth::attempt($request->only('email','password'))) {
    			$user = Auth::user();
    			$token = $user->createToken('app')->accessToken;

    			return response([
    				'message' => "Successfully Login",
    				'token' => $token,
    				'user' => $user
    			],200); // States Code
    		}

    	}catch(Exception $exception){
    		return response([
    			'message' => $exception->getMessage()
    		],400);
    	}
    	return response([
    		'message' => 'Invalid Email Or Password' 
    	],401);

    } // end method

    public function storeUser(Request $request)
    {
        try {
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6',
            ]);
    
            // If validation fails, return error response
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validator->errors(),
                ], 422); // 422 is the HTTP status code for validation errors
            }
    
            // Create the user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
    
            // Generate a token for the user
            $token = $user->createToken('app')->accessToken;
    
            // Return success response with token and user data
            return response()->json([
                'status' => true,
                'message' => 'User created successfully',
                'token' => $token,
                'user' => $user,
            ], 201); // 201 is the HTTP status code for resource creation
    
        } catch (\Throwable $th) {
            // Log the error for debugging
            Log::error('Error in storeUser method: ' . $th->getMessage());
    
            // Return error response
            return response()->json([
                'status' => false,
                'message' => 'An error occurred while creating the user',
                'error' => $th->getMessage(),
            ], 500); // 500 is the HTTP status code for server errors
        }
    }
    
    public function Logout(Request $request)
    {
        try {
            $user = auth()->user();
            if ($user) {
                $user->tokens()->delete(); // Delete all tokens
                return response()->json([
                    'status' => true,
                    'message' => 'Successfully logged out'
                ], 200);
            }
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ], 401);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    
}
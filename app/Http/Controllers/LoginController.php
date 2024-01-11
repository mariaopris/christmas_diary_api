<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email','password');
        if(! auth()->attempt($credentials)){
            throw ValidationException::withMessages([
                'email' => 'Invalid credentials'
            ]);
        }

//        $request->session()->regenerate();
        $success['token'] =  auth()->user()->createToken('MyApp')->plainTextToken;
        $success['name'] =  auth()->user()->name;
        $success['email'] = auth()->user()->email;
        $success['id'] = auth()->user()->id;

        return response()->json($success);

//        return $this->sendResponse($success, 'User login successfully.');
    }
}

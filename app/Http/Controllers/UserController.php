<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function getUser(Request $request)
    {

//        $user = User::where('id',$request->user()->id)->first();
        try{
            return response()->json([
                'id' => $request->user()->id,
                'email' => $request->user()->email,
                'password' => $request->user()->password,
                'name'=>$request->user()->name,
            ]);
        }catch (\Exception $exception) {
            $response = [
                'state' => false,
                'error' => $exception->getMessage(),
            ];
            return response()->json($response, 400);
        }
    }

    public function logout(Request $request){
        try {
            $user = $request->user();
            if ($user !== null) {
                $user->currentAccessToken()->delete();
            }
            return response()->json(['message'=>'Logout successfully']);

        } catch (\Exception $exception) {
            $response = [
                'state' => false,
                'error' => $exception->getMessage(),
            ];
            return response()->json($response, 400);
        }
    }

    public function index()
    {
        try {
            $users = User::all();
        }catch (\Exception $exception) {
            return response()->json(['status' => false, 'message' => $exception->getMessage()]);
        }

        return response()->json(['status' => true, 'users' => $users]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);
        }catch (\Exception $exception) {
            return response()->json(['status' => false, 'message' => $exception->getMessage()]);
        }

        return response()->json(['status' => true, 'message' => 'User saved successfully !', 'user_id' => $user->id]);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}

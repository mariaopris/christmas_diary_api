<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function getGroups(){
        $groups = Group::all();
        return response()->json(['status' => 'success', 'data' => $groups]);
    }

    public function addGroup(Request $request){
        try {
            Group::create([
                'name' => $request->name,
                'members' => $request->members,
            ]);
        }catch (\Exception $exception) {
            return response()->json(['status' => false, 'message' => $exception->getMessage()]);
        }

        return response()->json(['status' => true, 'message' => 'Group added successfully!']);
    }
}

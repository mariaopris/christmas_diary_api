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
}

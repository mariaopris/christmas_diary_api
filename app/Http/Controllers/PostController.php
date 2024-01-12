<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function getPostsForGroup($group_id)
    {
        $posts = Post::where('group_id', $group_id)->get();
        foreach ($posts as $post) {
            $user = User::where('id', '=', $post->user_id)->first();
            $post['user_name'] = $user->name;
            $post['user_email'] = $user->email;
        }
        return response()->json(['status' => true, 'posts' => $posts]);
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $imagePath = Storage::disk('public')->putFile('posts', $request->file('photo'));

            $post = Post::create([
                'group_id' => $request->group_id,
                'user_id' => $request->user_id,
                'photo' => $imagePath,
                'description' => $request->description,
            ]);
        }catch (\Exception $exception) {
            return response()->json(['status' => false, 'message' => $exception->getMessage()]);
        }

        return response()->json(['status' => true, 'message' => 'Post saved successfully !']);
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

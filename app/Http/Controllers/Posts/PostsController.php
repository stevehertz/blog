<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    //
    public function index()
    {
        # code...
        return Post::all();
    }

    public function store(Request $request)
    {
        # code...
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string'
        ]);

        $data = $request->all();

        Post::create([
            'title' => $data['title'],
            'slug' => Str::slug($data['title']),
            'description' => $data['description']
        ]);

        $response['status'] = true;
        $response['message'] = "You have successfully created a new post";
        return response()->json($response);

    }

    public function show($id)
    {
        # code...
        $post = Post::findOrFail($id);
        $response['status'] = true;
        $response['data'] = $post;
        return response()->json($response);
    }

    public function update(Request $request, $id)
    {
        # code...
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string'
        ]);

        $data = $request->all();

        $post = Post::findOrFail($id);

        $post->update([
            'title' => $data['title'],
            'slug' => Str::slug($data['title']),
            'description' => $data['description']
        ]);

        $response['status'] = true;
        $response['message'] = "You have successfully updated a post";
        return response()->json($response);
    }

    public function destroy($id)
    {
        # code...
        $post = Post::findOrFail($id);
        $post->delete();
        $response['status'] = true;
        $response['message'] = "You have successfully deleted a post";
        return response()->json($response);
    }
}

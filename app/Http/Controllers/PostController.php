<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::paginate(3);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        if (auth()->id() != $post->user_id) {
            return abort(403);
        }
        return view('posts.edit', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:100',
            'short_description' => 'required',
            'full_description' => 'required',
        ]);


        $newRow = new Post();
        $newRow->title = request()->input('title');
        $newRow->short_description = request()->input('short_description');
        $newRow->full_description = request()->input('full_description');
        $newRow->user_id = auth()->id();

        if (request()->hasFile('image')) {
            $newRow['image'] = Storage::putFile('posts', request()->file('image'));
        }

        $newRow->save();

        return redirect()->route('posts.show', $newRow->id)->with('success', 'Post stored successfully');
    }

    public function update(Post $post)
    {
        if (auth()->id() != $post->user_id) {
            return abort(403);
        }

        request()->validate([
            'title' => [
                'required',  Rule::unique('posts')->ignore($post->id),
                'max:100'
            ],
            'short_description' => 'required',
            'full_description' => 'required',
        ]);

        $post->update([
            'title' => request()->input('title'),
            'short_description' => request()->input('short_description'),
            'full_description' => request()->input('full_description'),
        ]);

        if (request()->hasFile('image')) {
            $row['image'] = Storage::putFile('posts', request()->file('image'));
        }

        return redirect($post->path())->with('success', 'Post updated successfully');
    }
}

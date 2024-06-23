<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;

use function PHPUnit\Framework\returnSelf;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = post::all();
        return view('posts.index', ['posts' => $posts]);
    }
    public function home()
    {
        $posts = post::all();
        return view('home', ['posts' => $posts]);
    }
    public function search(Request $request)
    {
        $q = $request->q;
        $posts = post::where('description', 'LIKE', '%' . $q . '%')->get(   );
        return view('posts.search', ['posts' => $posts]);
    }
    public function create()
    {
        return view('posts.add');
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => ['required', 'string', 'min:3'],
                'description' => ['required', 'string', 'min:3', 'max:30'],
                'user' => ['required', 'exists:users,id']
            ]
        );
        $post = new POST();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->user;
        $post->save();
        return back()->with('success', 'post Addedd Successfully');
    }

    public function edit($id)
    {
        $post = post::findOrFail($id);
        return view('posts.edit', ['post' => $post]);
    }
    public function show($id)
    {
        $post = post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }
    public function update($id, Request $request)
    {
        $request->validate(
            [
                'title' => ['required', 'string', 'min:3'],
                'description' => ['required', 'string', 'min:3', 'max:30'],
                'user' => ['required', 'exists:users,id']
            ]
        );
        $post = post::findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->user;
        $post->save();
        return redirect('posts')->with('success', 'post Edited Successfully');
    }
    public function destroy($id)
    {

        $post = post::findOrFail($id);
        $post->delete();
        return back()->with('success', 'post Deleted Successfully');
    }
}

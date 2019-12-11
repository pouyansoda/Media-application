<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostsCreateRequest;
use App\photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index')->with([
            'posts' => $posts
        ]);
    }

    public function create()
    {
        $category = Category::pluck('name', 'id')->all();
        return view('admin.posts.create')->with([
            'category' => $category,
        ]);

    }

    public function store(PostsCreateRequest $request)
    {
        $input = $request->all();
        $user = Auth::user();
        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }
        $user->post()->create($input);
        return redirect('/admin/posts');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::pluck('name', 'id')->all();

        $post = Post::findOrFail($id);
        if (!(Auth::user()->id == ($post->user->id))) {
            return redirect('/admin/posts')->with('notAllowed', 'You are not allowed to modify another user post');
        }

        return view('admin.posts.edit')->with([
            'post' => $post,
            'category' => $category,

        ]);

    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $user = Auth::user();
        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }
        $post = $user->post()->whereId($id)->first()->update($input);
        return redirect('/admin/posts')->with('updated', 'post successfully has been updated');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        unlink(public_path() . $post->photo->file);
        $post->delete();
        return redirect('/admin/posts')->with('deleted', 'The post successfully has been deleted');

    }
}

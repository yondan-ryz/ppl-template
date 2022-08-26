<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $posts = Post::all();
        $logos = Post::all()->where('title','=',"logo");
//        dd($posts);

        //render view with posts
        return view('posts.index', compact('posts','logos'));
    }
    public function indexlogo()
    {
        //get posts
        $logos = Post::all();
        $posts = Post::all()->where('title','=',"logo");
//        dd($posts);

        //render view with posts
        return view('posts.index', compact('posts','logos'));
    }
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'     => 'required|min:1',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/images', $image->hashName());

        //create post
        Post::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
        ]);

        //redirect to index
        return redirect()->route('post.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * edit
     *
     * @param  mixed $post
     * @return void
     */
    public function edit(Post $post)
    {
        return view('posts/edit', compact('post'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Post $post, $id)
    {
        //validate form
        $t = $request->validate( [
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'     => 'required|min:5',
        ]);
dd($t);
        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/images', $image->hashName());

            //delete old image
            Storage::delete('public/images/'.$post->image);

            //update post with new image
            $post->update([
                'image'     => $image->hashName(),
                'title'     => $request->title
            ]);

        } else {

            //update post without image
            $post->update([
                'title'     => $request->title,
            ]);
        }

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy(Post $post , $id)
    {
        //delete image
        Storage::delete('public/posts/'. $post->image);

        //delete post
        Post::destroy($id);
//        $post->delete();

        //redirect to index
        return redirect()->route('post.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

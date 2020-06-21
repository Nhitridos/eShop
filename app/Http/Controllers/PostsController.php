<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        //$posts = Post::all();
        //$categories = Category::all();
        //$posts = Post::orderBy('title', 'desc')->paginate(10); - pozriet neskor!!
        return view('posts.index', compact('posts'));//compact('posts', 'categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required'
        ]);

        // Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if (Auth::check()){
            $post->user_id = auth()->user()->id;
        }
        else {
            return redirect('/posts')->with('error', 'No user logged in!');
        }
        $post->category_id = $request->input('category_id');
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required'
        ]);

        // Update Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->category_id = $request->input('category_id');
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/home')->with('success', 'Post Removed');
    }

    // /**
    //  * Show the form for answering the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function answer($id){
    //     $post = Post::find($id);
    //     return view('/posts/answer')->with('post', $post);
    // }

    // public function storeAnswer(Request $request)
    // {
    //     $this->validate($request, [
    //         'body' => 'required',
    //     ]);

    //     // Create Post
    //     $post = new Post;
    //     $post->title = $request->input('title');
    //     $post->body = $request->input('body');
    //     $post->user_id = auth()->user()->id;
    //     $post->topic = $request->input('topic');
    //     $post->save();

    //     return redirect('/posts')->with('success', 'Post Created');
    // }

    public function showPostsCategory($id)
    {
        $posts = Post::all()->where('category_id', '=', $id);
        $categories = Category::all();

        return view('/posts/index')->with('posts', 'categories', $posts, $categories);
    }
}

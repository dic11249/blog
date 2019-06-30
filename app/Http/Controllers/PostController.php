<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBlogPost;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    public function admin()
    {
        $posts = Post::where('user_id', Auth::id())->get();
        return view('posts.admin', ['posts' => $posts]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view('posts.index',['posts' => $posts ,'categories' => $categories]);
    }

    public function indexWithCategory(Category $category)
    {
        $posts = Post::where('category_id', $category->id)->get();
        $categories = Category::all();
        return view('posts.index', ['posts' => $posts, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post;
        $categories = Category::all();
        return view('posts.create',['post' => $post, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {
        $post = new Post;
        $post->fill($request->all());
        $post->user_id = Auth::id();
        $post->save();

        $tags = explode(',', $request->tags);
        $this->addTagsToPost($tags, $post);

        return redirect('/posts/admin');
    }

    private function addTagsToPost($tags, $post)
    {
        foreach ($tags as $key => $tag) {
            // create / load tags
            $model = Tag::firstOrCreate(['name' => $tag]);
            // connect post & tags
            $post->tags()->attach($model->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if(Auth::check())
            return view('/posts.showByAdmin',['post' => $post]);
        else
            $categories = Category::all();
            return view( '/posts.show', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('/posts.edit', ['post' => $post, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBlogPost $request, Post $post)
    {
        $post->fill($request->all());
        $post->save();

        //remove old relationships
        $post->tags()->detach();

        $tags = explode(',', $request->tags);
        $this->addTagsToPost($tags, $post);

        return redirect('/posts/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        // return redirect('posts/admin');  前端Ajax call Delete 不需重導
    }
}

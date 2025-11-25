<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category','author')->orderBy('id', 'desc')->paginate(25);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::with('parent')->where('is_active','1')->latest()->get();
        return view('admin.post.post', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name             = $request->input('name');
        $slug             = $request->input('slug');
        $content          = preg_replace('/<p>(?:\s|&nbsp;|<br\s*\/?>)*<\/p>/', '', $request->input('content'));
        $meta_title       = $request->input('meta_title');
        $meta_keywords    = $request->input('meta_keywords');
        $meta_description = $request->input('meta_description');
        $excerpt          = $request->input('excerpt');
        $category_id      = $request->input('category_id');
        $is_published     = $request->input('is_published') ? 1 : 0;
        
        $imagePath = null;
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('uploads/posts', 'public');
        }
        
        $post = Post::create(
            [
                'title'            => $name,
                'category_id'      => $category_id,
                'slug'             => $slug,
                'content'          => $content,
                'meta_title'       => $meta_title,
                'meta_keywords'    => $meta_keywords,
                'meta_description' => $meta_description,
                'is_published'     => $is_published,
                'excerpt'          => $excerpt,
                'featured_image'   => $imagePath,
                'user_id'          => Auth::id(),
            ]
        );
        return redirect()->route('admin.blog.post')->with('success', 'Post saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail(decrypt($id));
        $categories = Category::with('parent')->where('is_active','1')->latest()->get();
        return view('admin.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $name             = $request->input('name');
        $content          = preg_replace('/<p>(?:\s|&nbsp;|<br\s*\/?>)*<\/p>/', '', $request->input('content'));
        $meta_title       = $request->input('meta_title');
        $meta_keywords    = $request->input('meta_keywords');
        $meta_description = $request->input('meta_description');
        $excerpt          = $request->input('excerpt');
        $category_id      = $request->input('category_id');
        $is_published     = $request->input('is_published') ? 1 : 0;

        $post = Post::findOrFail($request->input('id'));
        $post->title            = $name;
        $post->category_id      = $category_id;
        $post->content          = $content;
        $post->meta_title       = $meta_title;
        $post->meta_keywords    = $meta_keywords;
        $post->meta_description = $meta_description;
        $post->is_published     = $is_published;
        $post->excerpt          = $excerpt;
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('uploads/posts', 'public');
            $post->featured_image = $imagePath;
        }
        $post->user_id          = Auth::id();
        $post->save();

        return redirect()->back()->with('success', 'Post saved successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

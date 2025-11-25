<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('parent')->orderBy('id', 'desc')->paginate(25);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        // ✅ Validate request inputs
        $request->validate([
            'name'             => 'required|string|max:60',
        ]);
        
        // ✅ Generate slug if empty
        $slug = $request->slug ?: Str::slug($request->name);

        // ✅ Handle image upload (if exists)
        $imagePath = null;
        if ($request->hasFile('image')) {
        
            $imagePath = $request->file('image')->store('categories', 'public');
        }else{
            $category = Category::find($request->id);
            $imagePath = $category ? $category->image : null;
        }

        

        // ✅ Create category
        $category = Category::updateOrCreate(
            ['id' => $request->id],
            [
                'name'             => $request->name,
                'slug'             => $slug,
                'parent_id'        => $request->parent_id,
                'description'      => $request->description,
                'meta_title'       => $request->meta_title ?: $request->name,
                'meta_description' => $request->meta_description,
                'meta_keywords'    => $request->meta_keywords,
                'image'            => $imagePath,
                'is_active'        => $request->boolean('is_active'),
            ]
        );
        if ($category->wasRecentlyCreated) {
            // ✅ New record was created
            $message = 'Category created successfully!';
            return redirect()->route('admin.categories.index')->with('success', $message);
        } else {
            // 🔁 Existing record was updated
            $message = 'Category updated successfully!';
            return redirect()->back()->with('success', $message);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail(decrypt($id));
        $categories = Category::whereNull('parent_id')->where('id', '!=', $id)->get();
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }

    public function allPostLink()
    {
        echo "---------------------------------Category LINKS-------------------------------------<br>";
        $categories = Category::with('posts')->where('is_active', 1)->get();
        foreach ($categories as $category) {
            $url = url('/blog/category/'.$category->slug);
            echo $url . "<br>";
        }
        echo "---------------------------------POST LINKS-------------------------------------<br>";
        foreach ($categories as $category) {

            foreach ($category->posts as $post) {
                $url = url('/blog/'.$category->slug.'/'.$post->slug);
                echo $url . "<br>";
            }
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Gallery::orderBy('id', 'desc')->paginate(25);
        return view('admin.gallery', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $upload = $request->file('featured_image');
        if (!$upload) {
            return redirect()->back()->with('error', 'No image file selected.');
        }
        
        $sizes = [
            'img' => [1200, 800],
            // 'banner' => [1600, 900],
            // 'featured' => [400, 250],
        ];

        foreach ($sizes as $type => [$width, $height]) {
            $post = Image::read($upload)->scaleDown($width, $height);

            $encoded = $post->encodeByExtension($upload->getClientOriginalExtension(), quality: 80);
            $filename = Str::random(20) . 'manamil-dev.' .'png';
            $path = "gallery/{$type}/{$filename}";

            Storage::put($path, $encoded);


   
            Gallery::create([
                'title' => ucfirst($type),
                'type' => 'image',
                'file_path' => $path,
                'uploaded_by' => Auth::id(),
                'w' => $width,
                'h' => $height,
            ]);
        }
        return redirect()->route('admin.gallery')->with('success', 'Image uploaded successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $id = decrypt($id);
        $image = Gallery::find(intval($id));
        $path = $image->file_path ?? null; 
        if (Storage::exists($path)) {
            Storage::delete($path);
            
        } 
        $image->forceDelete();
        return redirect()->back()->with('success', 'Image deleted successfully.');
    }
}

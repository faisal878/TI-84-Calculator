<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function home()
    {
        $settings = Setting::where('type', 'home')->first();
        return view('admin.settings.home', compact('settings'));
    }
    public function privacy()
    {
        $settings = Setting::where('type', 'privacy-policy')->first();
        return view('admin.settings.privacy-policy', compact('settings'));
    }

    public function terms()
    {
        $settings = Setting::where('type', 'terms-and-conditions')->first();
        return view('admin.settings.terms-and-conditions', compact('settings'));
    }

    public function socialmedia()
    {
        $settings = Setting::where('type', 'social-media')->get();
        return view('admin.settings.social-media', compact('settings'));
    }

    public function updateSetting(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'title' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'content' => 'nullable|string',
        ]);

        
        if($request->type == 'social-media'){
            $fields = ['Facebook', 'Twitter', 'Instagram', 'LinkedIn'];
            foreach ($fields as $field) {
                Setting::updateOrCreate(
                    ['type' => 'social-media', 'title' => $field],
                    ['data' => $request->input($field)]
                );
            }
            return redirect()->back()->with('success', 'Social media links updated successfully.');
        }
        $settings = Setting::updateOrCreate(
            ['type' => $request->type],
            [
                'title' => $request->title,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'data' => $request->content,
            ]
        );
        return redirect()->back()->with('success', 'Settings updated successfully.');
    }   
}

@extends('admin')
@php
    $metaTtitle = 'Social Media Settings'; 
    $placeholders = [
        'Facebook'      => 'Enter Facebook profile or page link',
        'Instagram'     => 'Enter Instagram profile link',
        'Twitter'       => 'Enter Twitter (X) profile link',
        'LinkedIn'      => 'Enter LinkedIn profile or company page link',
        'YouTube'       => 'Enter YouTube channel or video link',
        'TikTok'        => 'Enter TikTok profile link',
        'Pinterest'     => 'Enter Pinterest profile or board link',
        'Snapchat'      => 'Enter Snapchat username or profile link',
        'Reddit'        => 'Enter Reddit profile or subreddit link',
        'Tumblr'        => 'Enter Tumblr blog link',
        'WhatsApp'      => 'Enter WhatsApp number or chat link',
        'Telegram'      => 'Enter Telegram channel or username link',
        'Vimeo'         => 'Enter Vimeo profile or video link',
        'Discord'       => 'Enter Discord server invite link',
        'GitHub'        => 'Enter GitHub profile or repo link',
        'Dribbble'      => 'Enter Dribbble profile link',
        'Behance'       => 'Enter Behance profile link',
        'Flickr'        => 'Enter Flickr profile link',
        'Medium'        => 'Enter Medium profile or article link',
        'Spotify'       => 'Enter Spotify profile or playlist link',
    ];
@endphp

@section('content')
    <form action="{{ route('admin.settings.store') }}" method="POST" enctype="multipart/form-data" class="pr-3">
        @csrf
        <input type="hidden" name="type" value="social-media">
        <div class="bg-white rounded-2xl grid grid-cols-1 gap-4 p-4 mb-4">
            <h2 class="text-lg ps-1 font-bold text-gray-900">Social Media Settings</h2>
        </div>
        <div class="grid grid-cols-12 gap-4">
           <div class="bg-white rounded-2xl col-span-12 p-4">
                @foreach ($settings as $setting)
                    @if(isset($placeholders[$setting->title]))
                        <label for="{{ $setting->title }}" class="text-[#808191] mb-1 text-sm block"> {{ $setting->title }} </label>
                        <input type="text" name="{{ $setting->title }}" id="{{ $setting->title }}" value="{{ old($setting->title, $setting->data ?? '') }}" class="bg-gray-200 text-sm mb-4 py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600" placeholder="{{ $placeholders[$setting->title] }}" >
                    @endif
                @endforeach
                <div class="text-right">
                    <input type="submit" value="Save Settings" class="text-sm bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 cursor-pointer">
                </div>
            </div>

        </div>
        
    </form>
   
    
@endsection


@push('script')

@endpush

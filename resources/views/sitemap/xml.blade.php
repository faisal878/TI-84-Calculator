{!! '<?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

    {{-- 1. Homepage (Top Priority) --}}
    <url>
        <loc>{{ route('home') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    {{-- Tools --}}
    {{-- <url>
        <loc>{{ route('tools') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url> --}}
    @foreach ($tools as $tool)
        <url>
            <loc>{{ url('/' . ltrim($tool->slug, '/')) }}</loc>
            <lastmod>{{ now()->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.7</priority>
        </url>
        @if (!$tool->parentTool)
            @php $childTools = \App\Models\Tool::where('tool_id', $tool->id)->where('status', 1)->get(); @endphp
            @foreach ($childTools as $child)
                <url>
                    <loc>{{  url('/' . ($child->language ?? 'en') . '/' . ltrim($child->slug, '/')) }}</loc>
                    <lastmod>{{ now()->toAtomString() }}</lastmod>
                    <changefreq>monthly</changefreq>
                    <priority>0.6</priority>
                </url>
            @endforeach
        @endif
    @endforeach
    
    {{-- 4. Individual Blog Posts (Dynamic Content) --}}
    @foreach ($posts as $post)
        <url>
            {{-- Ensure category slug and post slug are correctly passed for the route --}}
            <loc>{{ url('/blog/'.$post->slug) }}</loc>
            <lastmod>{{ optional($post->updated_at)->toAtomString() ?? $post->created_at->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>

            {{-- Dynamic Priority Calculation: Zyada naye posts ko zyada priority --}}
            <priority>
                @php
                    $lastModified = optional($post->updated_at)->tz('UTC') ?? $post->created_at->tz('UTC');
                    $days = now()->diffInDays($lastModified);
                @endphp
                @if($days <= 7)
                    0.9
                @elseif($days <= 30)
                    0.8
                @else
                    0.7
                @endif
            </priority>

            {{-- Google Image Sitemaps: Featured image add karein --}}
            @if (!empty($post->featured_image) || !empty($post->image_url))
                <image:image>
                    {{-- Image full URL (storage + fallback) --}}
                    @php $imagePath = !empty($post->featured_image) ? asset('storage/' . $post->featured_image) : $post->image_url; @endphp
                    <image:loc>{{ $imagePath }}</image:loc>

                    {{-- Optional image title --}}
                    @if (!empty($post->title))
                        <image:title>{{ Str::limit($post->title, 100) }}</image:title>
                    @endif
                </image:image>
            @endif

        </url>
    @endforeach

    {{-- 3. Categories (Index Pages) --}}
    {{-- @foreach ($categories as $category)
        <url>
            <loc>{{ url('/blog/'.$category->slug) }}</loc>
            <lastmod>{{ optional($category->updated_at)->toAtomString() ?? $category->created_at->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach --}}

    

    {{-- Other --}}
    <url>
        <loc>{{ route('about-us') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
    <url>
        <loc>{{ route('privacy-policy') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>yearly</changefreq>
        <priority>0.3</priority>
    </url> 
    <url>
        <loc>{{ route('terms-and-conditions') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc>{{ route('contact') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    

</urlset>
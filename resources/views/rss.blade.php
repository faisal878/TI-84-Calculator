{{-- resources/views/rss.blade.php --}}
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:media="http://search.yahoo.com/mrss/" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:dc="http://purl.org/dc/elements/1.1/">

<channel>
  {{-- Channel basic info --}}
  <title><![CDATA[{{ config('app.name') }}]]></title>
  <link>{{ url('/') }}</link>
  <description><![CDATA[{{ config('app.name') }} - Latest posts, tutorials and updates.]]></description>
  <language>en-us</language>
  <copyright>Copyright {{ date('Y') }} {{ config('app.name') }}</copyright>
  <generator>Manamil Dev RSS Generator</generator>
  <ttl>60</ttl>
  <managingEditor>muhammadmanamil@gmail.com ({{ config('app.name') }})</managingEditor>
  <webMaster>muhammadmanamil@gmail.com (Webmaster)</webMaster>

  {{-- Self link --}}
  <atom:link href="{{ url('/rss.xml') }}" rel="self" type="application/rss+xml"/>

  {{-- Optional channel image/logo if exists in public --}}
  @php
    $channelLogoPath = public_path('logo.png');
    $channelLogo = file_exists($channelLogoPath) ? asset('logo.png') : null;
  @endphp
  @if($channelLogo)
    <image>
      <url>{{ $channelLogo }}</url>
      <title><![CDATA[{{ config('app.name') }}]]></title>
      <link>{{ url('/') }}</link>
    </image>
  @endif

  {{-- Channel lastBuildDate (latest post updated_at) --}}
  @php
    $last = $posts->sortByDesc('updated_at')->first();
  @endphp
  <lastBuildDate>{{ $last?->updated_at?->toRssString() ?? now()->toRssString() }}</lastBuildDate>

  {{-- Loop items --}}
  @foreach($posts as $post)
    @php
      // Post URL (absolute)
      $postUrl = route('blog.post.content', ['cat_slug' => $post->category->slug ?? 'uncategorized', 'slug' => $post->slug]);

      // Prepare image URL (absolute). If stored as relative path, convert with asset()
      $imageUrl = null;
      if (!empty($post->featured_image)) {
          $img = 'storage/'.$post->featured_image;
          // if (Str::startsWith($img, ['http://','https://'])) {
          //     $imageUrl = $img;
          // } elseif (Str::startsWith($img, 'storage/')) {
          //     $imageUrl = asset($img);
          // } else {
              $imageUrl = asset($img);
          // }
      }

      // Try to compute enclosure length (bytes) from public path if possible
      $enclosureLength = 0;
      if ($imageUrl) {
          $path = parse_url($imageUrl, PHP_URL_PATH) ?: null;
          if ($path) {
              $localPath = public_path($path);
              if (file_exists($localPath)) {
                  $enclosureLength = filesize($localPath);
              } else {
                  // fallback 0 if file not local/accessible
                  $enclosureLength = 0;
              }
          }
      }

      // detect mime type by extension (fallback)
      $imageType = null;
      if ($imageUrl) {
          $ext = strtolower(pathinfo(parse_url($imageUrl, PHP_URL_PATH), PATHINFO_EXTENSION));
          $map = [
              'jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg',
              'png' => 'image/png',
              'gif' => 'image/gif',
              'webp' => 'image/webp',
              'svg' => 'image/svg+xml',
          ];
          $imageType = $map[$ext] ?? 'image/jpeg';
      }

      // Prepare safe excerpt
      $excerpt = $post->meta_description
                 ?? Str::limit(strip_tags($post->content), 200, '...');

      // Author email & name fallback
      $authorEmail = $post->author->email ?? config('mail.from.address', 'admin@' . request()->getHost());
      // Ensure authorEmail contains @; if not, fallback to admin@host
      if (!Str::contains($authorEmail, '@')) {
          $authorEmail = 'admin@' . request()->getHost();
      }
      $authorName = $post->author->name ?? config('app.name') ?? 'Admin';

      // Convert relative URLs in post content to absolute URLs (handles src/href without http)
      $contentHtml = $post->content ?? '';
      // Fix any src/href that do not start with http(s) or // — prefix with url('/')
      $contentHtml = preg_replace_callback(
          '#(src|href)=([\'"])(?!https?://|//)([^\'"]+)\2#i',
          function ($m) {
              $base = rtrim(url('/'), '/');
              $path = ltrim($m[3], '/');
              return $m[1] . '=' . $m[2] . $base . '/' . $path . $m[2];
          },
          $contentHtml
      );

      // Additionally, convert storage paths like /storage/... or storage/... to absolute asset URLs
      $contentHtml = preg_replace_callback(
          '#(src|href)=([\'"])([^\'"]*storage/[^\'"]+)\2#i',
          function ($m) {
              $u = $m[3];
              // if starts with / then remove leading slash for asset()
              $u = ltrim($u, '/');
              return $m[1] . '=' . $m[2] . asset($u) . $m[2];
          },
          $contentHtml
      );

    @endphp

    <item>
      <title><![CDATA[{{ $post->meta_title ?? $post->title }}]]></title>
      <link>{{ $postUrl }}</link>
      <guid isPermaLink="true">{{ $postUrl }}</guid>

      {{-- description with image (if any). Use width attribute instead of inline style. --}}
      <description><![CDATA[
        <p>{{ $excerpt }}</p>
        @if($imageUrl)
          <p><img src="{{ $imageUrl }}" alt="{{ $post->title }}" width="600" /></p>
        @endif
      ]]></description>

      {{-- full HTML content (absolute URLs fixed above) --}}
      <content:encoded><![CDATA[
        {!! $contentHtml !!}
      ]]></content:encoded>

      {{-- enclosure + media tag with length and type --}}
      @if($imageUrl)
        <enclosure url="{{ $imageUrl }}" type="{{ $imageType }}" length="{{ $enclosureLength }}" />
        <media:content url="{{ $imageUrl }}" medium="image" />
      @endif

      {{-- author must be email (name in parens) --}}
      <author>{{ $authorEmail }} ({{ $authorName }})</author>

      {{-- pubDate only (RFC-822 via ->toRssString()) --}}
      <pubDate>{{ $post->created_at->toRssString() }}</pubDate>

      {{-- categories / keywords (comma separated) --}}
      @if(!empty($post->meta_keywords))
        @foreach(explode(',', $post->meta_keywords) as $kw)
          <category><![CDATA[{{ trim($kw) }}]]></category>
        @endforeach
      @else
        <category><![CDATA[{{ $post->category->name ?? 'Blog' }}]]></category>
      @endif
    </item>
  @endforeach

</channel>
</rss>

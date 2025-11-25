<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Tool;
use Illuminate\Support\Str;

class WebController extends Controller
{
    public function home(){
       
        $tool = Tool::with('parentTool','childTools')->where('home', 1)->where('status', 1)->first();
        $tools = Tool::where('home',0)->whereNull('tool_id')->where('status', 1)->get();
        if($tool){
            seo()
            ->title($tool->meta_title)
            ->description($tool->meta_description)
            ->keywords($tool->meta_keywords)
            ->images(asset('assets/img/Logo.png'))
            ->canonicalEnabled(true);
            if($tool->index == 0){
                seo()->robots('noindex', 'nofollow'); 
            }else{
                seo()->robots('index', 'follow');
            }

            $toolLang = $this->toollang($tool);
          
            $xDefaultLink = '';
            if (!$tool->parentTool) {
                $xDefaultLink = url('/');
            } else {
                $xDefaultLink = url($tool->parentTool->slug);
            }
            
            return view('web.home', compact('tool','tools', 'toolLang','xDefaultLink'));
        }else{
            seo()
            ->title('Welcome to Manamil.dev - Your Ultimate Web Development Resource')
            ->description('Discover a wide range of web development tools, articles, and resources at Manamil.dev. Stay ahead in the world of web development with our expert insights and practical solutions.')
            ->keywords('web development, web tools, programming, coding, web design, frontend development, backend development, fullstack development')
            ->images(asset('assets/img/Logo.png'))
            ->canonicalEnabled(true)
            ->robots('index', 'follow');
        }
        
        
        return view('web.home', compact('tools'));
    }

    public function toollang($tool){
        $getParent = Tool::where('id',$tool->tool_id)->first();
        if($getParent){
            $data = Tool::select('language','slug') ->where('status', 1)->where('tool_id',$getParent->id)->get();
        }else{
            $data = Tool::select('language','slug') ->where('status', 1)->where('tool_id',$tool->id)->get();
        }
        $lang = [];
        foreach($data as $item){
             $lang[] = ['lang' =>$item->language, 'slug' =>$item->slug];
        }
        return $lang;
    }

    
    public function blog(){
       
        $posts = Post::with('category','author')->where('is_published', 1)->latest()->paginate(10);
        seo()
            ->title('TI Calculator Blog | Tips, Tutorials & Online Calculator Guides')
            ->description('Explore our TI calculator blog for tutorials, tips, and guides on TI-84, TI-84 Plus CE, TI-30XS, and other online calculators. Learn how to use virtual calculators, graph functions, and solve equations with ease.')
            ->canonicalEnabled(true)
            ->robots('index', 'follow'); 

        return view('web.articles', compact('posts'));
    }


    public function singleArticle( $slug){
        
       
        $post = Post::with('category','author')->where('is_published', 1)->where('slug', $slug)->firstOrFail();
        $readNext = Post::with('category','author')->where('is_published', 1)->where('slug', '!=', $slug)->limit(3)->inRandomOrder()->get();
        seo()
            ->title($post->title)
            ->description($post->meta_description)
            ->keywords($post->meta_keywords)
            ->images(asset('storage/' . $post->featured_image))
            ->canonicalEnabled(true)
            ->robots('index', 'follow')
            
            // BASIC OG
            ->openGraphProperty('og:title', $post->title)
            ->openGraphProperty('og:description', $post->meta_description)
            ->openGraphProperty('og:type', 'article')
            ->openGraphProperty('og:site_name', 'Manamil.dev')
            ->openGraphLocale('en_US')
            ->openGraphUrl(url()->current())

            // IMAGE OG
            ->openGraphImage(asset('storage/' . $post->featured_image))
            ->openGraphImages([ asset('storage/' . $post->featured_image) ])
            ->openGraphProperty('og:image:alt', $post->title)
            ->openGraphProperty('og:image:type', 'image/png') 
            ->openGraphProperty('og:image:width', '800') 
            ->openGraphProperty('og:image:height', '450')
            ->openGraphProperty('og:image:secure_url', asset('storage/' . $post->featured_image))

            // ARTICLE-SPECIFIC
            ->openGraphProperty('article:published_time', $post->created_at->toIso8601String())
            ->openGraphProperty('article:modified_time', $post->updated_at->toIso8601String())
            ->openGraphProperty('og:updated_time', $post->updated_at->toIso8601String())
            ->openGraphProperty('article:author:username', $post->author->name ?? 'Manamil')
            ->openGraphProperty('article:section', $post->category->name)
            // ->openGraphProperty('article:tag', $post->tags->pluck('name')->implode(', '))

            // JSON-LD
            ->jsonLdEnabled(true)
            ->jsonLdType('BlogPosting') // WebPage bhi chalega, lekin blog post ke liye BlogPosting best
            ->jsonLdName($post->title) // Post ka title
            ->jsonLdDescription(Str::limit($post->excerpt, 150)) // Post ka short excerpt
            ->jsonLdImage(asset('storage/' . $post->featured_image)) // main image
            ->jsonLdImages([ asset('storage/' . $post->featured_image), ])
            ->jsonLdUrl(route('blog.post.content', ['slug'=>$post->slug]))
            ->jsonLdProperty('author', [
                '@type' => 'Person',
                'name' => $post->author->name ?? 'Manamil'
            ])
            ->jsonLdProperty('publisher', [
                '@type' => 'Organization',
                'name' => 'Manamil.dev',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('assets/img/logo.png')
                ]
            ])
            ->jsonLdProperty('datePublished', $post->created_at->toIso8601String())
            ->jsonLdProperty('dateModified', $post->updated_at->toIso8601String())
            ->jsonLdNonce('some-value'); 

        return view('web.single-article', compact('post', 'readNext'));
    }
    

    public function singleCategory($slug){
        $category = Category::where('slug', $slug)->firstOrFail();
        $categoires = Category::where('is_active', 1)->latest()->get();
        $posts = Post::with('category','author')->where('is_published', 1)->where('category_id', $category->id)->latest()->paginate(25);

        seo()
            ->title($category->title)
            ->description($category->meta_description)
            ->keywords($category->meta_keywords)
            ->canonicalEnabled(true)
            ->robots('index', 'follow'); 
        return view('web.articles-category', compact('categoires', 'posts', 'category'));
    }


    public function contact(){
        seo()
            ->title('Contact Us')
            ->description('Get in touch with us through our contact page.')
            ->keywords('contact, get in touch, support')
            ->canonicalEnabled(true)
            ->robots('index', 'follow'); 
        return view('web.contact');
    }


    public function about_us(){
         seo()
            ->title('About Us')
            ->description('Learn more about us on our about page.')
            ->keywords('about, information, company')
            ->canonicalEnabled(true)
            ->robots('index', 'follow'); 

        return view('web.about-us');
    }



    public function privacy_policy(){
        $settings = Setting::where('type', 'privacy-policy')->first();
        seo()
            ->title($settings->title ?? null)
            ->description($settings->meta_description ?? null)
            ->canonicalEnabled(true)
            ->robots('index', 'follow'); 

        return view('web.privacy-policy', compact('settings'));
    }



    public function terms_and_conditions(){
        
        $settings = Setting::where('type', 'terms-and-conditions')->first();
        seo()
            ->title($settings->title ?? null)
            ->description($settings->meta_description ?? null)
            ->canonicalEnabled(true)
            ->robots('index', 'follow'); 

        return view('web.terms-and-conditions', compact('settings'));
    }
}

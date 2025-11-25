<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ToolsController extends Controller
{

    public function index(){
        $tools = Tool::with('parentTool')->orderBy('id','desc')->get();
        return view('admin.tools.index', compact('tools'));
    }

    public function create(){
        $tools = Tool::orderBy('id','desc')->get();
        return view('admin.tools.create', compact('tools'));
    }

    public function edit($id){
        $decryptedId = decrypt($id);
        $tool = Tool::findOrFail($decryptedId);
        $tools = Tool::orderBy('id','desc')->get();
        return view('admin.tools.edit', compact('tool', 'tools'));
    }

    public function store(Request $request){
       
        $title              = $request->input('title');
        $slug               = $request->input('slug');
        $meta_title         = $request->input('meta_title');
        $meta_description   = $request->input('meta_description');
        $meta_keywords      = $request->input('meta_keywords');
        $language           = $request->input('language');
        $tool_id            = $request->input('tool_id');
        $status             = $request->input('status') ? 1 : 0;
        $key                = $request->input('key');

        if(is_array($key)){
            $data = [];
            foreach($key as $index => $value){
                $inputValue = $request->input('value')[$index] ?? null;
                $inputType = $request->input('input_type')[$index] ?? null;

                if($value){ // ensure key is not empty
                    $data[$value] = [
                        'type' => $inputType,
                        'value' => $inputValue,
                    ];
                }
            }

            $data = json_encode($data, JSON_UNESCAPED_UNICODE);
        }else{
            $data = null;
        }
      
        $tool = Tool::create(
            [
                'title'            => $title,
                'slug'             => $slug,
                'meta_title'       => $meta_title,
                'meta_description' => $meta_description,
                'meta_keywords'    => $meta_keywords,
                'language'         => $language,
                'tool_id'          => $tool_id,
                'status'           => $status,
                'data'             => $data,

            ]
        );
        return redirect()->route('admin.tools.index')->with('success', 'Tool created successfully.');
    }
    
    public function update(Request $request){
       
        $id                 = $request->input('id');
        $title              = $request->input('title');
        $meta_title         = $request->input('meta_title');
        $meta_description   = $request->input('meta_description');
        $meta_keywords      = $request->input('meta_keywords');
        $language           = $request->input('language');
        $tool_id            = $request->input('tool_id');
        $status             = $request->input('status') ? 1 : 0;
        $indexNow           = $request->input('index') ? 1 : 0;
        $home               = $request->input('home') ? 1 : 0;
        $key                = $request->input('key');
       
        $tool = Tool::findOrFail($id);
        
        
        if(is_array($key)){
            $data = [];

            foreach($key as $index => $value){
                $inputValue = $request->input('value')[$index] ?? null;
                $inputType = $request->input('input_type')[$index] ?? null;

                if($value){ // ensure key is not empty
                    $data[$value] = [
                        'type' => $inputType,
                        'value' => $inputValue,
                    ];
                }
            }

            $data = json_encode($data, JSON_UNESCAPED_UNICODE);

        }else{
            $data = $tool->data;
        }
   
        $tool->update(
            [
                'title'            => $title,
                'meta_title'       => $meta_title,
                'meta_description' => $meta_description,
                'meta_keywords'    => $meta_keywords,
                'language'         => $language,
                'tool_id'          => $tool_id,
                'status'           => $status,
                'index'            => $indexNow,
                'home'             => $home,
                'data'             => $data,
            ]
        );
    
        return redirect()->route('admin.tools.edit', ['id' => encrypt($id)])->with('success', 'Tool updated successfully.');
    }

    public function tools(Request $request) {
        $tools = Tool::whereNull('tool_id')->where('index',1)->where('status',1)->orderBy('title','asc')->get();
        seo()
            ->title('Empowering 50+ Free Developer & Website Tools')
            ->description('Over 50 powerful online tools, our platform helps Web Developers, Webmasters, Students, Programmers & SEO Experts work smarter every day.From coding utilities to website optimization tools — everything you need in one place.')
            ->keywords('developer tools, online tools, website tools, seo tools, programming utilities, web development resources, free online tools, coding tools, webmaster tools, site optimization tools')
            ->images(asset('assets/img/Logo.png'))
            ->canonicalEnabled(true)
            
            ->robots('index', 'follow');
        
        return view('web.tools.tools', compact('tools'));
    }

    public function toolsSingle($lang = null, $slug = null)
    {
        if ($slug == null) {
            $slug = $lang;
            $lang = null;
        }

        $tool = Tool::with('parentTool','childTools') ->where('slug', $slug) ->where('status', 1) ->firstOrFail();
          
        $toolLang = $this->toollang($tool);

        if ($lang) { $tool->language = $lang; }

        seo()->title($tool->meta_title) ->description($tool->meta_description) ->keywords($tool->meta_keywords) ->images(asset('assets/img/Logo.png')) ->canonicalEnabled(true);
        if($tool->index == 0){
            seo()->robots('noindex', 'nofollow'); 
        }else{
            seo()->robots('index', 'follow');
        }
            
        $xDefaultLink = '';
        if (!$tool->parentTool) {
            $xDefaultLink = url('tools/'.$tool->slug);
        } else {
            $xDefaultLink = url('tools/'.$tool->parentTool->slug);
        }

        $data = null;

        if ($tool->parentTool) {
            return view('web.tools.' . $tool->parentTool->slug, compact('tool', 'data', 'toolLang','xDefaultLink'));
        }

     
        return view('web.tools.' . $tool->slug, compact('tool', 'data', 'toolLang','xDefaultLink'));
    }


    public function toollang($tool){
        $getParent = Tool::where('id',$tool->tool_id)->first();
        if($getParent ){
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

}

    



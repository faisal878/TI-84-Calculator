@extends('admin')
@php
    $metaTtitle = 'Tool Edit'; 
@endphp

@section('content')
    <form action="{{ route('admin.tools.update') }}" method="POST" enctype="multipart/form-data" class="pr-3">
        @csrf
        <input type="hidden" name="id" value="{{ $tool->id }}">
        <div class="bg-white rounded-2xl grid grid-cols-1 gap-4 p-4 mb-4"> <h2 class="text-lg ps-1 font-bold text-gray-900">Edit Tool</h2> </div>
        <div class="grid grid-cols-12 gap-4">
            <div class=" col-span-9">
                <div class="bg-white rounded-2xl p-4 grid grid-cols-12 gap-4">
                    <div class="col-span-6">
                        <label for="title" class="text-[#808191] mb-1 text-sm block">Title <span class="text-red-600">*</span></label>
                        <input type="text" name="title" id="title" value="{{ $tool->title }}" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600" required>
                    </div>
                    <div class="col-span-6">
                        <label for="slug" class="text-[#808191] mb-1 text-sm block">Slug <span class="text-red-600">*</span></label>
                        <input type="text" name="slug" id="slug" value="{{ $tool->slug }}" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600" required>
                    </div>
                    
                    <div class="col-span-6">
                        <label for="meta_title" class="text-[#808191] mb-1 text-sm block">Meta Title <span class="text-red-600">*</span></label>
                        <input type="text" name="meta_title" id="meta_title" value="{{ $tool->meta_title }}" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600" required>
                    </div>
                    <div class="col-span-6">
                        <label for="meta_description" class="text-[#808191] mb-1 text-sm block">Meta Description <span class="text-red-600">*</span></label>
                        <input type="text" name="meta_description" id="meta_description" value="{{ $tool->meta_description }}" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600" required>
                    </div>
                    <div class="col-span-12">
                        <label for="meta_keyword" class="text-[#808191] mb-1 text-sm block">Meta Keyword</label>
                        <input type="text" name="meta_keywords" id="meta_keyword" value="{{ $tool->meta_keywords }}" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
                    </div>
                    <div class="my-4 col-span-12 rows">
                        <h2 class="font-bold text-lg">Content:</h2>
                        <div class="grid grid-cols-12 gap-4 mb-4 appendRow">
                            @if ($tool->data)
                                @php
                                    $data = json_decode($tool->data, true) ?? [];
                                @endphp

                                @foreach ($data as $key => $item)
                                    @php
                                        $inputType = $item['type'] ?? '';
                                        $value = $item['value'] ?? '';
                                        $itemKey = $item['key'] ?? '';
                                    @endphp

                                    <div class="col-span-3">
                                        <label for="key" class="text-[#808191] mb-1 text-sm block">Key</label>
                                        <input type="text" name="key[]" value="{{ $key }}" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
                                    </div>

                                    <div class="col-span-9">
                                        <label for="value" class="text-[#808191] mb-1 text-sm block">Value</label>

                                        @if ($inputType == 'Input Fields')
                                            <input type="text" name="value[]" value="{{ $value }}" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
                                        @elseif ($inputType == 'Text Area')
                                            <textarea name="value[]" rows="4" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">{{ $value }}</textarea>
                                        @elseif ($inputType == 'Rich Text')
                                            
                                            <textarea name="value[]" id="editor_{{ $key }}" class="bg-gray-200 rich-editor text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600" rows="4">{{ $value }}</textarea>
                                        @endif
                                    </div>

                                    <input type="hidden" name="input_type[]" value="{{ $inputType }}">
                                @endforeach

                            @else
                                <div class="col-span-3">
                                    <label for="key" class="text-[#808191] mb-1 text-sm block">Key</label>
                                    <input type="text" name="key[]" id="key" value="" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
                                </div>
                                <div class="col-span-9">
                                    <label for="value" class="text-[#808191] mb-1 text-sm block">Value</label>
                                    <input type="text" name="value[]" id="value" value="" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
                                </div>
                                <input type="hidden" name="input_type[]" value="Input Fields">
                            @endif
                           
                        </div>
                        <div class="grid grid-cols-12 gap-4 ">
                            <div class="col-span-7"></div>
                            <div class="col-span-3">
                                <select name="" id="inputType" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
                                    <option value="">-- Select input Type --</option>
                                    <option value="1">Input Fields</option>
                                    <option value="2">Text Area</option>
                                    <option value="3">Rich Text</option>
                                </select>
                            </div>
                            <div class="col-span-2">
                                <button type="button" class="text-xs bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 cursor-pointer block w-full" id="addRow">Add Row</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-3">
                <div class="bg-white rounded-2xl p-4 mb-3">
                    <h2 class="text-lg ps-1 font-bold text-gray-900 mb-1">Language</h2>
                    <select name="language" id="language" class="mb-3 bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
                        <option value="">-- Select Language --</option>
                        <option value="en" {{ $tool->language == 'en' ? 'selected' : '' }}>English</option> <option value="es" {{ $tool->language == 'es' ? 'selected' : '' }}>Spanish</option> <option value="fr" {{ $tool->language == 'fr' ? 'selected' : '' }}>French</option> <option value="de" {{ $tool->language == 'de' ? 'selected' : '' }}>German</option> <option value="it" {{ $tool->language == 'it' ? 'selected' : '' }}>Italian</option> <option value="pt" {{ $tool->language == 'pt' ? 'selected' : '' }}>Portuguese</option> <option value="ru" {{ $tool->language == 'ru' ? 'selected' : '' }}>Russian</option> <option value="zh" {{ $tool->language == 'zh' ? 'selected' : '' }}>Chinese</option> <option value="ja" {{ $tool->language == 'ja' ? 'selected' : '' }}>Japanese</option> <option value="ko" {{ $tool->language == 'ko' ? 'selected' : '' }}>Korean</option> <option value="ar" {{ $tool->language == 'ar' ? 'selected' : '' }}>Arabic</option> <option value="hi" {{ $tool->language == 'hi' ? 'selected' : '' }}>Hindi</option> <option value="bn" {{ $tool->language == 'bn' ? 'selected' : '' }}>Bengali</option> <option value="pa" {{ $tool->language == 'pa' ? 'selected' : '' }}>Punjabi</option> <option value="te" {{ $tool->language == 'te' ? 'selected' : '' }}>Telugu</option> <option value="mr" {{ $tool->language == 'mr' ? 'selected' : '' }}>Marathi</option> <option value="ta" {{ $tool->language == 'ta' ? 'selected' : '' }}>Tamil</option> <option value="ur" {{ $tool->language == 'ur' ? 'selected' : '' }}>Urdu</option> <option value="gu" {{ $tool->language == 'gu' ? 'selected' : '' }}>Gujarati</option> <option value="kn" {{ $tool->language == 'kn' ? 'selected' : '' }}>Kannada</option> <option value="ml" {{ $tool->language == 'ml' ? 'selected' : '' }}>Malayalam</option> <option value="or" {{ $tool->language == 'or' ? 'selected' : '' }}>Odia</option> <option value="tr" {{ $tool->language == 'tr' ? 'selected' : '' }}>Turkish</option> <option value="vi" {{ $tool->language == 'vi' ? 'selected' : '' }}>Vietnamese</option> <option value="th" {{ $tool->language == 'th' ? 'selected' : '' }}>Thai</option> <option value="id" {{ $tool->language == 'id' ? 'selected' : '' }}>Indonesian</option> <option value="ms" {{ $tool->language == 'ms' ? 'selected' : '' }}>Malay</option> <option value="fil" {{ $tool->language == 'fil' ? 'selected' : '' }}>Filipino</option> <option value="pl" {{ $tool->language == 'pl' ? 'selected' : '' }}>Polish</option> <option value="uk" {{ $tool->language == 'uk' ? 'selected' : '' }}>Ukrainian</option> <option value="nl" {{ $tool->language == 'nl' ? 'selected' : '' }}>Dutch</option> <option value="sv" {{ $tool->language == 'sv' ? 'selected' : '' }}>Swedish</option> <option value="da" {{ $tool->language == 'da' ? 'selected' : '' }}>Danish</option> <option value="no" {{ $tool->language == 'no' ? 'selected' : '' }}>Norwegian</option> <option value="fi" {{ $tool->language == 'fi' ? 'selected' : '' }}>Finnish</option> <option value="cs" {{ $tool->language == 'cs' ? 'selected' : '' }}>Czech</option> <option value="hu" {{ $tool->language == 'hu' ? 'selected' : '' }}>Hungarian</option> <option value="ro" {{ $tool->language == 'ro' ? 'selected' : '' }}>Romanian</option> <option value="bg" {{ $tool->language == 'bg' ? 'selected' : '' }}>Bulgarian</option> <option value="el" {{ $tool->language == 'el' ? 'selected' : '' }}>Greek</option> <option value="he" {{ $tool->language == 'he' ? 'selected' : '' }}>Hebrew</option> <option value="fa" {{ $tool->language == 'fa' ? 'selected' : '' }}>Persian</option> <option value="sw" {{ $tool->language == 'sw' ? 'selected' : '' }}>Swahili</option> <option value="am" {{ $tool->language == 'am' ? 'selected' : '' }}>Amharic</option> <option value="yo" {{ $tool->language == 'yo' ? 'selected' : '' }}>Yoruba</option> <option value="ig" {{ $tool->language == 'ig' ? 'selected' : '' }}>Igbo</option> <option value="ha" {{ $tool->language == 'ha' ? 'selected' : '' }}>Hausa</option> <option value="zu" {{ $tool->language == 'zu' ? 'selected' : '' }}>Zulu</option> <option value="xh" {{ $tool->language == 'xh' ? 'selected' : '' }}>Xhosa</option> <option value="af" {{ $tool->language == 'af' ? 'selected' : '' }}>Afrikaans</option> <option value="is" {{ $tool->language == 'is' ? 'selected' : '' }}>Icelandic</option> <option value="lv" {{ $tool->language == 'lv' ? 'selected' : '' }}>Latvian</option> <option value="lt" {{ $tool->language == 'lt' ? 'selected' : '' }}>Lithuanian</option> <option value="et" {{ $tool->language == 'et' ? 'selected' : '' }}>Estonian</option> <option value="sk" {{ $tool->language == 'sk' ? 'selected' : '' }}>Slovak</option> <option value="sl" {{ $tool->language == 'sl' ? 'selected' : '' }}>Slovenian</option> <option value="hr" {{ $tool->language == 'hr' ? 'selected' : '' }}>Croatian</option> <option value="sr" {{ $tool->language == 'sr' ? 'selected' : '' }}>Serbian</option> <option value="bs" {{ $tool->language == 'bs' ? 'selected' : '' }}>Bosnian</option> <option value="mk" {{ $tool->language == 'mk' ? 'selected' : '' }}>Macedonian</option> <option value="sq" {{ $tool->language == 'sq' ? 'selected' : '' }}>Albanian</option> <option value="mt" {{ $tool->language == 'mt' ? 'selected' : '' }}>Maltese</option> <option value="ga" {{ $tool->language == 'ga' ? 'selected' : '' }}>Irish</option> <option value="cy" {{ $tool->language == 'cy' ? 'selected' : '' }}>Welsh</option> <option value="eu" {{ $tool->language == 'eu' ? 'selected' : '' }}>Basque</option> <option value="ca" {{ $tool->language == 'ca' ? 'selected' : '' }}>Catalan</option> <option value="gl" {{ $tool->language == 'gl' ? 'selected' : '' }}>Galician</option> <option value="ast" {{ $tool->language == 'ast' ? 'selected' : '' }}>Asturian</option> <option value="oc" {{ $tool->language == 'oc' ? 'selected' : '' }}>Occitan</option> <option value="sc" {{ $tool->language == 'sc' ? 'selected' : '' }}>Sardinian</option> <option value="co" {{ $tool->language == 'co' ? 'selected' : '' }}>Corsican</option> <option value="gd" {{ $tool->language == 'gd' ? 'selected' : '' }}>Scottish Gaelic</option> <option value="br" {{ $tool->language == 'br' ? 'selected' : '' }}>Breton</option> <option value="fy" {{ $tool->language == 'fy' ? 'selected' : '' }}>Frisian</option> <option value="lb" {{ $tool->language == 'lb' ? 'selected' : '' }}>Luxembourgish</option> <option value="als" {{ $tool->language == 'als' ? 'selected' : '' }}>Alemannic</option> <option value="st" {{ $tool->language == 'st' ? 'selected' : '' }}>Sotho</option> <option value="tn" {{ $tool->language == 'tn' ? 'selected' : '' }}>Tswana</option> <option value="ss" {{ $tool->language == 'ss' ? 'selected' : '' }}>Swati</option> <option value="ve" {{ $tool->language == 've' ? 'selected' : '' }}>Venda</option> <option value="ts" {{ $tool->language == 'ts' ? 'selected' : '' }}>Tsonga</option> <option value="nr" {{ $tool->language == 'nr' ? 'selected' : '' }}>Ndebele</option>
                    </select>
                    <h2 class="text-lg ps-1 font-bold text-gray-900 mb-1">Present</h2>
                    <select name="tool_id" id="tool_id" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
                        <option value="">-- Select Present --</option>
                        @if ($tools->isNotEmpty())
                            @foreach ($tools as $item)
                                <option value="{{ $item->id }}" {{ $tool->tool_id == $item->id ? 'selected' : '' }}>{{ $item->title }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="bg-white rounded-2xl p-4 mb-4">
                    <h2 class="text-lg ps-1 font-bold text-gray-900 mb-4">Publish</h2>
                    <label for="published" class="border border-gray-300 py-2 px-3 block bg-gray-200 rounded-md text-sm mb-4 cursor-pointer">
                        <input type="checkbox" name="status" {{ $tool->status == 1 ? 'checked' : '' }} id="published" value="1" class="me-2"> Publish Now
                    </label>
                    <label for="index" class="border border-gray-300 py-2 px-3 block bg-gray-200 rounded-md text-sm mb-4 cursor-pointer">
                        <input type="checkbox" name="index" {{ $tool->index == 1 ? 'checked' : '' }} id="index" value="1" class="me-2"> Index Now
                    </label>
                    <label for="home" class="border border-gray-300 py-2 px-3 block bg-gray-200 rounded-md text-sm mb-4 cursor-pointer">
                        <input type="checkbox" name="home" {{ $tool->home == 1 ? 'checked' : '' }} id="home" value="1" class="me-2">Is Home Page
                    </label>
                    <div class="text-right">
                        <input type="submit" value="Save Tool" class="text-sm bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 cursor-pointer">
                    </div>
                </div>
            </div>
        </div>
        
    </form>
   
    
@endsection


@push('script')
<script src="https://cdn.tiny.cloud/1/v0h9k9gp515ty6n8fywi8a1squ5ba8e06fl4pmqjhbtapmd2/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>

<script>
//addRow
document.getElementById('addRow').addEventListener('click', function() {
    var appendRow = document.querySelector('.appendRow');
    var inputType = document.getElementById('inputType').value;
    var html = '';
    if(inputType == '') {
        alert('Please select input type');
        return;
    }else if(inputType == '1') {
        html = `
            <div class="col-span-3">
                <label for="key" class="text-[#808191] mb-1 text-sm block">Key</label>
                <input type="text" name="key[]" id="key" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
            </div>
            <div class="col-span-9">
                <label for="value" class="text-[#808191] mb-1 text-sm block">Value</label>
                <input type="text" name="value[]" id="value" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
            </div>
            <input type="hidden" name="input_type[]" value="Input Fields">
        `;
    }else if(inputType == '2') {
        html = `
            <div class="col-span-3">
                <label for="key" class="text-[#808191] mb-1 text-sm block">Key</label>
                <input type="text" name="key[]" id="key" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
            </div>
            <div class="col-span-9">
                <label for="value" class="text-[#808191] mb-1 text-sm block">Value</label>
                <textarea name="value[]" id="value" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600" rows="4"></textarea>
            </div>
            <input type="hidden" name="input_type[]" value="Text Area">
        `;
    }
    else if(inputType == '3') {
        let uniqueId = "editor_" + Date.now(); 
        html = `
            <div class="col-span-3">
                <label for="key" class="text-[#808191] mb-1 text-sm block">Key</label>
                <input type="text" name="key[]" id="key" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
            </div>
            <div class="col-span-9">
                <label for="value" class="text-[#808191] mb-1 text-sm block">Value</label>
                <textarea name="value[]" id="${uniqueId}" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600" rows="4"></textarea>
            </div>
            <input type="hidden" name="input_type[]" value="Rich Text">
        `;
        setTimeout(() => {
            tinymce.init({
                selector: `#${uniqueId}`,
                height: 300,
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks | bold italic underline | align | numlist bullist | link image | removeformat',
                content_style: "body { background-color: #e5e7eb; color: #000000; font-size:14px; }"
            });
        }, 200);
    }
    appendRow.insertAdjacentHTML('beforeend', html);
});

document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.getElementById('title');
    const slugInput = document.getElementById('slug');

    if (nameInput && slugInput) {
        nameInput.addEventListener('input', function() {
            let slug = this.value
                .toLowerCase()                    
                .trim()                           
                .replace(/[^a-z0-9\s-]/g, '')     
                .replace(/\s+/g, '-')             
                .replace(/-+/g, '-');             
            slugInput.value = slug;
        });
    }
});
document.addEventListener('DOMContentLoaded', function() {
    // Select all textarea with class 'rich-editor'
    document.querySelectorAll('textarea.rich-editor').forEach((editor) => {
        if (!tinymce.get(editor.id)) { // avoid re-init
            tinymce.init({
                selector: `#${editor.id}`,
                height: 300,
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks | bold italic underline | align | numlist bullist | link image | removeformat',
                content_style: "body { background-color: #e5e7eb; color: #000000; font-size:14px; }"
            });
        }
    });
});

</script>
@endpush

@extends('admin')
@php
    $metaTtitle = 'Tool Create'; 
@endphp

@section('content')
    <form action="{{ route('admin.tools.store') }}" method="POST" enctype="multipart/form-data" class="pr-3">
        @csrf
        <div class="bg-white rounded-2xl grid grid-cols-1 gap-4 p-4 mb-4">
            <h2 class="text-lg ps-1 font-bold text-gray-900">Add Tool</h2>
        </div>
        <div class="grid grid-cols-12 gap-4">
            <div class=" col-span-9">
                <div class="bg-white rounded-2xl p-4 grid grid-cols-12 gap-4">
                    <div class="col-span-6">
                        <label for="title" class="text-[#808191] mb-1 text-sm block">Title <span class="text-red-600">*</span></label>
                        <input type="text" name="title" id="title" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600" required>
                    </div>
                    <div class="col-span-6">
                        <label for="slug" class="text-[#808191] mb-1 text-sm block">Slug <span class="text-red-600">*</span></label>
                        <input type="text" name="slug" id="slug" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600" required>
                    </div>
                    <div class="col-span-6">
                        <label for="meta_title" class="text-[#808191] mb-1 text-sm block">Meta Title <span class="text-red-600">*</span></label>
                        <input type="text" name="meta_title" id="meta_title" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600" required>
                    </div>
                    <div class="col-span-6">
                        <label for="meta_description" class="text-[#808191] mb-1 text-sm block">Meta Description <span class="text-red-600">*</span></label>
                        <input type="text" name="meta_description" id="meta_description" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600" required>
                    </div>
                    <div class="col-span-12">
                        <label for="meta_keyword" class="text-[#808191] mb-1 text-sm block">Meta Keyword</label>
                        <input type="text" name="meta_keywords" id="meta_keyword" value="" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
                    </div>
                    <div class="my-4 col-span-12 rows">
                        <h2 class="font-bold text-lg">Content:</h2>
                        <div class="grid grid-cols-12 gap-4 mb-4 appendRow">
                            <div class="col-span-3">
                                <label for="key" class="text-[#808191] mb-1 text-sm block">Key</label>
                                <input type="text" name="key[]" id="key" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
                            </div>
                            <div class="col-span-9">
                                <label for="value" class="text-[#808191] mb-1 text-sm block">Value</label>
                                <input type="text" name="value[]" id="value" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
                            </div>
                            <input type="hidden" name="input_type[]" value="Input Fields">
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
                        <option value="">-- Select Language --</option> <option value="en">English</option> <option value="es">Spanish</option> <option value="fr">French</option> <option value="de">German</option> <option value="it">Italian</option> <option value="pt">Portuguese</option> <option value="ru">Russian</option> <option value="zh">Chinese</option> <option value="ja">Japanese</option> <option value="ko">Korean</option> <option value="ar">Arabic</option> <option value="hi">Hindi</option> <option value="bn">Bengali</option> <option value="pa">Punjabi</option> <option value="te">Telugu</option> <option value="mr">Marathi</option> <option value="ta">Tamil</option> <option value="ur">Urdu</option> <option value="gu">Gujarati</option> <option value="kn">Kannada</option> <option value="ml">Malayalam</option> <option value="or">Odia</option> <option value="tr">Turkish</option> <option value="vi">Vietnamese</option> <option value="th">Thai</option> <option value="id">Indonesian</option> <option value="ms">Malay</option> <option value="fil">Filipino</option> <option value="pl">Polish</option> <option value="uk">Ukrainian</option> <option value="nl">Dutch</option> <option value="sv">Swedish</option> <option value="da">Danish</option> <option value="no">Norwegian</option> <option value="fi">Finnish</option> <option value="cs">Czech</option> <option value="hu">Hungarian</option> <option value="ro">Romanian</option> <option value="bg">Bulgarian</option> <option value="el">Greek</option> <option value="he">Hebrew</option> <option value="fa">Persian</option> <option value="sw">Swahili</option> <option value="am">Amharic</option> <option value="yo">Yoruba</option> <option value="ig">Igbo</option> <option value="ha">Hausa</option> <option value="zu">Zulu</option> <option value="xh">Xhosa</option> <option value="af">Afrikaans</option> <option value="is">Icelandic</option> <option value="lv">Latvian</option> <option value="lt">Lithuanian</option> <option value="et">Estonian</option> <option value="sk">Slovak</option> <option value="sl">Slovenian</option> <option value="hr">Croatian</option> <option value="sr">Serbian</option> <option value="bs">Bosnian</option> <option value="mk">Macedonian</option> <option value="sq">Albanian</option> <option value="mt">Maltese</option> <option value="ga">Irish</option> <option value="cy">Welsh</option> <option value="eu">Basque</option> <option value="ca">Catalan</option> <option value="gl">Galician</option> <option value="ast">Asturian</option> <option value="oc">Occitan</option> <option value="sc">Sardinian</option> <option value="co">Corsican</option> <option value="gd">Scottish Gaelic</option> <option value="br">Breton</option> <option value="fy">Frisian</option> <option value="lb">Luxembourgish</option> <option value="als">Alemannic</option> <option value="st">Sotho</option> <option value="tn">Tswana</option> <option value="ss">Swati</option> <option value="ve">Venda</option> <option value="ts">Tsonga</option> <option value="nr">Ndebele</option>
                    </select>
                    <h2 class="text-lg ps-1 font-bold text-gray-900 mb-1">Present</h2>
                    <select name="tool_id" id="tool_id" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
                        <option value="">-- Select Present --</option>
                        @if ($tools->isNotEmpty())
                            @foreach ($tools as $tool)
                                <option value="{{ $tool->id }}">{{ $tool->title }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="bg-white rounded-2xl p-4 mb-4">
                    <h2 class="text-lg ps-1 font-bold text-gray-900 mb-4">Publish</h2>
                    <label for="published" class="border border-gray-300 py-2 px-3 block bg-gray-200 rounded-md text-sm mb-4 cursor-pointer">
                        <input type="checkbox" name="is_published" id="published" value="1" class="me-2"> Publish Now
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
</script>
@endpush

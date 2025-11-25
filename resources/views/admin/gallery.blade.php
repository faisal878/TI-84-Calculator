@extends('admin')
@php
    $metaTtitle = 'Gallery'; 
@endphp

@section('content')
    <div class="bg-white rounded-2xl grid grid-cols-1 gap-4 p-4 mb-4">
        <h2 class="text-lg ps-1 font-bold text-gray-900">Gallery</h2>
    </div>
    <div class="grid grid-cols-12 gap-4">
        <div class="bg-white rounded-2xl col-span-9 p-4 ">
            <div class="flex flex-wrap items-start justify-start gap-3">
                @if ($images->isNotEmpty())
                    @foreach ($images as $image)
                        <div class="thumbnail w-[153px] h-[153px] border overflow-hidden relative">
                            <img src="{{ asset('storage/'.$image->file_path) }}" class="w-full h-full object-contain main-image" alt="">
                            <div class="z-3 absolute top-0 right-0 p-[2px] bg-[#E9E9E9] border">
                                <div class="flex items-center gap-1">
                                    <a href="javascript:void(0)"  onclick="copyImageSrc(this)"><img src="{{ asset('assets/img/icons/copy.svg') }}" class="w-[17px] h-[17px]" alt=""></a>
                                    <a href="{{ route('admin.gallery.destroy', ['id' => Crypt::encrypt($image->id)]) }}"><img src="{{ asset('assets/img/icons/close.svg') }}" class="w-[17px] h-[17px]" alt=""></a>
                                </div>
                            </div>
                           
                            {{-- <p class="absolute bottom-0 z-1 text-xs bg-white">Size: {{ $image->w }} x {{ $image->h }} </p> --}}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col-span-3">
            <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="bg-white rounded-2xl p-4 mb-3">
                    <h2 class="text-lg ps-1 font-bold text-gray-900 mb-3">Featured Image</h2>
                    <div class="border border-gray-200 h-[250px] bg-gray-200 rounded-md mb-3">
                        <img src="{{ asset('assets/img/landscape-placeholder.svg') }}" width="100%" id="preview" class="object-cover h-[250px]" alt="">
                    </div>
                    <input type="file" name="featured_image" id="featured_image" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
                </div>
                <div class="bg-white rounded-2xl p-4 mb-4">
                    <div class="text-right">
                        <input type="submit" value="Uploade Image" class="text-sm bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 cursor-pointer">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
<script>
// featured_image
document.getElementById('featured_image').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('preview');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
        }
        reader.readAsDataURL(file);
    } else {
        // agar koi image remove kare to placeholder wapas show kar do
        preview.src = "{{ asset('assets/img/landscape-placeholder.svg') }}";
    }
});
function copyImageSrc(element) {
    // parent div se thumbnail ka main image dhundho
    const thumbnail = element.closest('.thumbnail');
    if (!thumbnail) return;

    // thumbnail ke andar jo actual image copy karna hai
    const mainImage = thumbnail.querySelector('.main-image');
    if (!mainImage) return;

    const src = mainImage.src;

    navigator.clipboard.writeText(src)
        .then(() => {
            alert('Image path copied: ' + src);
        })
        .catch(err => {
            console.error('Copy failed', err);
        });
}
</script>
@endpush

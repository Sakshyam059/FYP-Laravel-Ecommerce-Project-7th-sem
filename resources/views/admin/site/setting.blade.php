@extends('admin.includes.main')
@section('content')
    <div class="">
        <div class="card">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="py-3 text-2xl">Website Setting</h2>
            </div>
            <div class="card-body">
                <form action="" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    @method('PUT')
                    <div class="grid grid-cols-2 gap-6 mb-3 ">
                        <div class="">
                            <label for="" class="block mb-3">Name</label>
                            <input type="text" class="w-full rounded" name="name" value="{{ $siteSetting->name??'' }}">
                            @error('name')
                                <span class="text-danger form-text">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="">
                            <label for="" class="block mb-3">Email</label>
                            <input type="text" class="w-full rounded" name="email" value="{{ $siteSetting->email??'' }}">
                            @error('email')
                                <span class="text-danger form-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-6 mb-3 ">
                        <div class="">
                            <label for="" class="block mb-3">Phone</label>
                            <input type="text" class="w-full rounded" name="phone" value="{{ $siteSetting->phone??'' }}">
                            @error('phone')
                                <span class="text-danger form-text">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="">
                            <label for="" class="block mb-3">Address</label>
                            <input type="text" class="w-full rounded" name="address" value="{{ $siteSetting->address??'' }}">
                            @error('address')
                                <span class="text-danger form-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6 mb-3 ">
                        <div class="">
                            <label class="block mb-3">Logo</label>
                            @if (!empty($siteSetting->logo))
                                @php
                                    $logoUrl = asset('admin/images/logos/' . $siteSetting->logo);
                                @endphp
                            @else
                                @php
                                    $logoUrl = '';
                                @endphp
                            @endif
                            <label class="mb-3 form-control" for="logo" style="display:{{ $logoUrl ? 'block' : 'none' }};"
                                id="logoImgLabel">
                                <img id="previewLogoImg" src="{{ $logoUrl }}" alt="Placeholder" class="rounded"
                                    width="60%" height="200px">
                            </label>
                            <input type="file" class=" form-control" name="logo" onchange="previewLogo(this);"
                                id="logo">
                        </div>
                        <div class="">
                            <label class="block mb-3">Favicon</label>
                            @if (!empty($siteSetting->favicon))
                                @php
                                    $iconUrl = asset('admin/images/favicon/' . $siteSetting->favicon);
                                @endphp
                            @else
                                @php
                                    $iconUrl = '';
                                @endphp
                            @endif
                            <label class="mb-3 form-control" for="favicon" style="display:{{ $iconUrl ? 'block' : 'none' }}"
                                id="iconImgLabel">
                                <img id="previewIconImg" src="{{ $iconUrl }}" alt="Placeholder" class="rounded"
                                    width="60%" height="200px">
                            </label>
                            <input type="file" class=" form-control" name="favicon" onchange="previewIcon(this);"
                                id="favicon">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-6 mb-3 ">
                        <div class="">
                            <label for="" class="block mb-3">Working Hrs</label>
                            <input type="text" class="w-full rounded" name="working_hrs"
                                value="{{ $siteSetting->working_hrs??'' }}">
                        </div>
                        <div class="">
                            <label for="" class="block mb-3">Copyrights</label>
                            <input type="text" class="w-full rounded" name="copyrights"
                                value="{{ $siteSetting->copyrights??'' }}">
                        </div>
                    </div>
                    <div class="mb-3 ">
                        <label class="block mb-3" for="description">Description</label>
                        <textarea class="w-full rounded" id="content" placeholder="Enter the Description" grid grid-s-2s="5" name="description">
                           
                            {!! html_entity_decode($siteSetting->description ?? '') !!}
                        </textarea>
                        @error('description')
                            <span class="text-danger form-text">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="grid grid-cols-3 gap-6 mb-3 ">
                        <div class="">
                            <label for="" class="block mb-3">Facebook Link</label>
                            <input type="text" class="w-full rounded" name="fb_link"
                                value="{{ $siteSetting->fb_link??'' }}">
                        </div>
                        <div class="">
                            <label for="" class="block mb-3">Instagram Link</label>
                            <input type="text" class="w-full rounded" name="insta_link"
                                value="{{ $siteSetting->insta_link??'' }}">
                        </div>
                        <div class="">
                            <label for="" class="block mb-3">Twitter Link</label>
                            <input type="text" class="w-full rounded" name="twitter_link"
                                value="{{ $siteSetting->twitter_link??'' }}">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <button class="px-6 py-2 text-white bg-blue-800 rounded-md">Save Settings</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script type="text/javascript">
        function previewLogo(input) {
            var logo = $("#logo").get(0).files[0];
            if (logo) {
                var reader = new FileReader();
                reader.onload = function() {
                    $("#logoImgLabel").show();
                    $("#previewLogoImg").attr("src", reader.result);
                }
                reader.readAsDataURL(logo);
            }
        }

        function previewIcon(input) {
            var icon = $("#favicon").get(0).files[0];
            if (icon) {
                var reader = new FileReader();
                reader.onload = function() {
                    $("#iconImgLabel").show();
                    $("#previewIconImg").attr("src", reader.result);
                }

                reader.readAsDataURL(icon);
            }
        }
        ClassicEditor
            .create(document.querySelector('#content'), {
                ckfinder: {
                    uploadUrl: '{{ route('admin.site_setting.description') . '?_token=' . csrf_token() }}',
                }
            })
            .catch(error => {

            });
    </script>
@endsection

@extends('admin.includes.main')
@section('content')
    <div class="p-4 space-y-4">
        <div>
            <h2 class="text-xl font-medium ">Website Setting</h2>
        </div>
        <div class="card-body">
            <form class="space-y-4" action="{{ route('admin.site_setting.update', $siteSetting->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="" class="block ">Name</label>
                        <input type="text" class="w-full rounded" name="name" value="{{ $siteSetting->name ?? '' }}">
                        @error('name')
                            <span class="text-xs text-red-600 ">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="space-y-2">
                        <label for="" class="block ">Email</label>
                        <input type="text" class="w-full rounded" name="email" value="{{ $siteSetting->email ?? '' }}">
                        @error('email')
                            <span class="text-xs text-red-600 ">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6 ">
                    <div class="space-y-2">
                        <label for="" class="block ">Phone</label>
                        <input type="text" class="w-full rounded" name="phone" value="{{ $siteSetting->phone ?? '' }}">
                        @error('phone')
                            <span class="text-xs text-red-600 ">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="space-y-2">
                        <label for="" class="block ">Address</label>
                        <input type="text" class="w-full rounded" name="address" value="{{ $siteSetting->address ?? '' }}">
                        @error('address')
                            <span class="text-xs text-red-600 ">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <label class="block ">Logo</label>
                        <label  class="block px-6 py-2 bg-gray-100 border rounded" for="logo" id="logoImgLabel">
                            <img class="hidden object-contain p-3 rounded w-36 h-36" src="" id="preview-logo"
                            alt="" />
                            <span>Choose a Icon</span>
                        </label>
                        <input class="hidden" type="file" name="logo" id="logo">
                    </div>
                    <div class="space-y-4">
                        <label class="block ">Favicon</label>             
                        <label  class="block px-6 py-2 bg-gray-100 border rounded" for="favicon" id="faviconImgLabel">
                            <img class="hidden object-contain p-3 rounded w-36 h-36" src="" id="preview-favicon"
                            alt="" />
                            <span>Choose a Favicon</span>
                        </label>
                        <input class="hidden" type="file" name="favicon" id="favicon">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="" class="block ">Working Hrs</label>
                        <input type="text" class="w-full rounded" name="working_hrs"
                            value="{{ $siteSetting->working_hrs ?? '' }}">
                    </div>
                    <div class="space-y-2">
                        <label for="" class="block ">Copyrights</label>
                        <input type="text" class="w-full rounded" name="copyrights"
                            value="{{ $siteSetting->copyrights ?? '' }}">
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="block " for="description">Description</label>
                    <textarea class="w-full rounded" id="content" placeholder="Enter the Description" grid grid-s-2s="5"
                        name="description"> {!! html_entity_decode($siteSetting->description ?? '') !!}</textarea>
                    @error('description')
                        <span class="text-xs text-red-600 ">{{ $message }}</span>
                    @enderror
                </div>
                <div class="grid grid-cols-3 gap-6">
                    <div class="space-y-2">
                        <label for="" class="block ">Facebook Link</label>
                        <input type="text" class="w-full rounded" name="fb_link"
                            value="{{ $siteSetting->fb_link ?? '' }}">
                    </div>
                    <div class="space-y-2">
                        <label for="" class="block ">Instagram Link</label>
                        <input type="text" class="w-full rounded" name="insta_link"
                            value="{{ $siteSetting->insta_link ?? '' }}">
                    </div>
                    <div class="space-y-2">
                        <label for="" class="block ">Twitter Link</label>
                        <input type="text" class="w-full rounded" name="twitter_link"
                            value="{{ $siteSetting->twitter_link ?? '' }}">
                    </div>
                </div>

                <div >
                    <button type="submit" class="px-6 py-2 text-white bg-blue-800 rounded-md">Save Settings</button>
                </div>
            </form>
        </div>

    </div>
@endsection
@push('script')
    <script>
        $(document).ready(() => {
            const logo = $("#logo");
            const favicon = $("#favicon");
            let file;
            logo.change(function(e) {
                file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $("#preview-logo").show();
                        $("#preview-logo").attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            favicon.change(function(e) {
                file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $("#preview-favicon").show();
                        $("#preview-favicon").attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endpush

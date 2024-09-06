<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteSettingPostRequest;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SitesettingController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('admin/site/setting'), $fileName);
            $url = asset('admin/site/setting/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function edit()
    {
        return view('admin.site.setting');
    }
    public function update(SiteSettingPostRequest $request, SiteSetting $siteSetting)
    {
        try {
            $data = $request->validated();
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $filename = $file->getClientOriginalName();
                $logo = time() . '_' . $filename;
                $file->move(public_path('admin/images/logos/'), $logo);
                File::delete(public_path('admin/images/logos/' . $siteSetting->logo));
                $data['logo'] = $logo;
            }
            if ($request->hasFile('favicon')) {
                $file = $request->file('favicon');
                $filename = $file->getClientOriginalName();
                $icon = time() . '_' . $filename;
                $file->move(public_path('admin/images/favicon/'), $icon);
                File::delete(public_path('admin/images/favicon/' . $siteSetting->favicon));
                $data['favicon'] = $icon;
            }
            $siteSetting->update($data);
            return redirect()->back()->with('success', 'Setting change successfull');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}

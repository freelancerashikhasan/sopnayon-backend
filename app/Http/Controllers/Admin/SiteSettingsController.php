<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileManager;
use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingsController extends Controller
{
    public function index()
    {
        $data = SiteSetting::first();
        return view('admin.site_settings.index', compact('data'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'email' => 'required',
            'logo' => 'nullable|image',
        ]);
        $data = SiteSetting::first();

        if ($request->hasFile('logo')) {
            $file = new FileManager();
            if ($request->logo) {
                if ($request->logo != null) {
                    Storage::disk('company')->delete($data->logo);
                }
                $photo = $request->logo;
                $file->folder('company')->prefix('company')->upload($photo) ? $image = $file->getName() : null;
            } else {
                $image = null;
            }
        } else {
            $image = $data->logo;
        }
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->logo = $image;
        $data->save();

        return redirect()->back()->with('success', 'Site settings updated successfully!');
    }
    public function chairmanInformationStore(Request $request)
    {
        $validated = $request->validate([
            'chairman_text' => 'required',
            'chairman_text_bn' => 'required',
            'chairman_image' => 'nullable|image',
        ]);
        $data = SiteSetting::first();

        if ($request->hasFile('chairman_image')) {
            $file = new FileManager();
            if ($request->chairman_image) {
                if (!empty($data->chairman_image)) {
                    Storage::disk('company')->delete($data->chairman_image);
                }
                $photo = $request->chairman_image;
                $file->folder('company')->prefix('chairman_image')->upload($photo) ? $image = $file->getName() : null;
            } else {
                $image = null;
            }
        } else {
            $image = $data->chairman_image;
        }
        $data->chairman_text = $request->chairman_text;
        $data->chairman_text_bn = $request->chairman_text_bn;
        $data->chairman_image = $image;
        $data->save();

        return redirect()->back()->with('success', 'Site settings updated successfully!');
    }
    public function sacretaryInformationStore(Request $request)
    {

        $validated = $request->validate([
            'secretary_text' => 'required',
            'secretary_text_bn' => 'required',
            'secretary_image' => 'nullable|image',
        ]);
        $data = SiteSetting::first();

        if ($request->hasFile('secretary_image')) {
            $file = new FileManager();
            if ($request->secretary_image) {
                if (!empty($data->secretary_image)) {
                    Storage::disk('company')->delete($data->secretary_image);
                }
                $photo = $request->secretary_image;
                $file->folder('company')->prefix('secretary_image')->upload($photo) ? $image = $file->getName() : null;
            } else {
                $image = null;
            }
        } else {
            $image = $data->secretary_image;
        }
        $data->secretary_text = $request->secretary_text;
        $data->secretary_text_bn = $request->secretary_text_bn;
        $data->secretary_image = $image;
        $data->save();

        return redirect()->back()->with('success', 'Site settings updated successfully!');
    }
    public function aboutUsStore(Request $request)
    {

        $validated = $request->validate([
            'about_us' => 'required',

        ]);
        $data = SiteSetting::first();
        $data->about_us = $request->about_us;
        $data->about_us_bn = $request->about_us_bn;
        $data->save();

        return redirect()->back()->with('success', 'Site settings updated successfully!');
    }
    public function termsAndConditionStore(Request $request)
    {

        $validated = $request->validate([
            'terms_and_condition' => 'required',
        ]);
        $data = SiteSetting::first();
        $data->terms_and_condition = $request->terms_and_condition;
        $data->terms_and_condition_bn = $request->terms_and_condition_bn;
        $data->save();

        return redirect()->back()->with('success', 'Site settings updated successfully!');
    }
    public function notice(Request $request)
    {

        $validated = $request->validate([
            'notice' => 'required',
            'notice_bn' => 'required',
        ]);
        $data = SiteSetting::first();
        $data->notice = $request->notice;
        $data->notice_bn = $request->notice_bn;
        $data->save();

        return redirect()->back()->with('success', 'Site settings updated successfully!');
    }
    public function memberNotice(Request $request)
    {

        $validated = $request->validate([
            'member_notice' => 'required',
            'member_notice_bn' => 'required',
        ]);
        $data = SiteSetting::first();
        $data->member_notice = $request->member_notice;
        $data->member_notice_bn = $request->member_notice_bn;
        $data->save();

        return redirect()->back()->with('success', 'Site settings updated successfully!');
    }
}

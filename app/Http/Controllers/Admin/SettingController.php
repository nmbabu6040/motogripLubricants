<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        return view(
            'admin.settings.index',
            compact('setting')
        );
    }

    public function update(Request $request)
    {
        $setting = Setting::first();

        if (!$setting) {
            $setting = new Setting();
        }

        $setting->company_name = $request->company_name;
        $setting->brand_name = $request->brand_name;
        $setting->phone = $request->phone;
        $setting->email = $request->email;
        $setting->whatsapp = $request->whatsapp;
        $setting->address = $request->address;
        $setting->about_short = $request->about_short;
        $setting->facebook = $request->facebook;
        $setting->linkedin = $request->linkedin;
        $setting->youtube = $request->youtube;
        $setting->instagram = $request->instagram;
        $setting->copyright = $request->copyright;
        $setting->mission = $request->mission;
        $setting->vision = $request->vision;
        $setting->chairman_name = $request->chairman_name;
        $setting->chairman_designation = $request->chairman_designation;
        $setting->chairman_message = $request->chairman_message;

        // header Logo Upload
        if ($request->hasFile('logo')) {

            if ($setting->logo) {

                Storage::disk('public')->delete(
                    'settings/' . $setting->logo
                );
            }

            $logoName = time() . '_logo.' . $request->logo->extension();

            $request->logo->storeAs(
                'settings',
                $logoName,
                'public'
            );

            $setting->logo = $logoName;
        }

        // footer Logo Upload
        if ($request->hasFile('footer_logo')) {

            if ($setting->footer_logo) {

                Storage::disk('public')->delete(
                    'settings/' . $setting->footer_logo
                );
            }

            $ftLogoName = time() . '_footer_logo.' . $request->footer_logo->extension();

            $request->footer_logo->storeAs(
                'settings',
                $ftLogoName,
                'public'
            );

            $setting->footer_logo = $ftLogoName;
        }

        // Favicon Upload
        if ($request->hasFile('favicon')) {

            if ($setting->favicon) {

                Storage::disk('public')->delete(
                    'settings/' . $setting->favicon
                );
            }

            $faviconName = time() . '_favicon.' . $request->favicon->extension();

            $request->favicon->storeAs(
                'settings',
                $faviconName,
                'public'
            );

            $setting->favicon = $faviconName;
        }

        // Catalog Upload
        if ($request->hasFile('catalog_pdf')) {

            if ($setting->catalog_pdf) {

                Storage::disk('public')->delete(
                    'settings/' . $setting->catalog_pdf
                );
            }

            $catalogName = time() . '_catalog.' . $request->catalog_pdf->extension();

            $request->catalog_pdf->storeAs(
                'settings',
                $catalogName,
                'public'
            );

            $setting->catalog_pdf = $catalogName;
        }

        // About Image Upload
        if ($request->hasFile('about_image')) {

            if ($setting->about_image) {

                Storage::disk('public')->delete(
                    'settings/' . $setting->about_image
                );
            }

            $aboutImage = time() . '_about.' . $request->about_image->extension();

            $request->about_image->storeAs(
                'settings',
                $aboutImage,
                'public'
            );

            $setting->about_image = $aboutImage;
        }

        // Mission Image Upload
        if ($request->hasFile('mission_image')) {

            if ($setting->mission_image) {

                Storage::disk('public')->delete(
                    'settings/' . $setting->mission_image
                );
            }

            $missionImage = time() . '_mission.' . $request->mission_image->extension();

            $request->mission_image->storeAs(
                'settings',
                $missionImage,
                'public'
            );

            $setting->mission_image = $missionImage;
        }

        // Vision Image Upload
        if ($request->hasFile('vision_image')) {

            if ($setting->vision_image) {

                Storage::disk('public')->delete(
                    'settings/' . $setting->vision_image
                );
            }

            $visionImage = time() . '_vision.' . $request->vision_image->extension();

            $request->vision_image->storeAs(
                'settings',
                $visionImage,
                'public'
            );

            $setting->vision_image = $visionImage;
        }

        // Chairman Image Upload
        if ($request->hasFile('chairman_image')) {

            if ($setting->chairman_image) {

                Storage::disk('public')->delete(
                    'settings/' . $setting->chairman_image
                );
            }

            $chairmanImage = time() . '_chairman.' . $request->chairman_image->extension();

            $request->chairman_image->storeAs(
                'settings',
                $chairmanImage,
                'public'
            );

            $setting->chairman_image = $chairmanImage;
        }

        $setting->save();

        return back()->with(
            'success',
            'Settings Updated Successfully'
        );
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        //fetch all banners with sort order
        $banners = Banner::orderBy('sort_order')->get();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:3000',
            'title' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer'
        ]);

        $path = null; //handle case if no img
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('banners', 'public');
        }

        $banner = new Banner();
        $banner->title = $request->title;
        $banner->image = $path;
        $banner->sort_order = $request->sort_order ?? 0;
        $banner->is_active = $request->has('is_active');
        $banner->save();

        return redirect()->route('admin.banners.index')->with('success', 'Banner created');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.form', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'image'      => 'nullable|image|max:3000', //3 MB img
            'title'      => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $banner->title = $request->title;
        $banner->sort_order = $request->sort_order ?? 0;
        $banner->is_active = $request->has('is_active');

        //if new img is uploaded remove old img
        if ($request->hasFile('image')) {

            if ($banner->image && Storage::disk('public')->exists($banner->image)) {
                Storage::disk('public')->delete($banner->image);
            }

            $banner->image = $request->file('image')->store('banners', 'public');
        }

        $banner->save();

        return redirect()
            ->route('admin.banners.index')
            ->with('success', 'Banner updated successfully');
    }


    public function destroy(Banner $banner)
    {
        if ($banner->image) {
            //delete img from storage folder
            Storage::disk('public')->delete($banner->image);
        }
        $banner->delete();
        return back()->with('success', 'Banner deleted');
    }
}

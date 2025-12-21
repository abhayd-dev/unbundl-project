<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PublicPageController extends Controller
{
    public function about()
    {
        $page = Page::where('slug', 'about-us')->where('is_active', true)->first();
        return view('frontend.pages.about', compact('page'));
    }

    public function contact()
    {
        $page = Page::where('slug', 'contact-us')->where('is_active', true)->first();
        return view('frontend.pages.contact', compact('page'));
    }
}
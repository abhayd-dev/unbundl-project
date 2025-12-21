<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        //fetch all pages newest first
        $pages = Page::latest()->get();

        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required',
        ]);

        $page = new Page();
        $page->title = $request->title;
        $page->slug = $this->generateUniqueSlug($request->title); //generate unique slug
        $page->content = $request->content;
        $page->is_active = $request->has('is_active');
        $page->save();

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Page created successfully.');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.form', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required',
        ]);

        //regenerate slug if title update
        if ($request->title !== $page->title) {
            $page->slug = $this->generateUniqueSlug($request->title, $page->id);
        }

        $page->title = $request->title;
        $page->content = $request->content;
        $page->is_active = $request->has('is_active');
        $page->save();

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Page updated successfully.');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return back()->with('success', 'Page deleted successfully.');
    }

    private function generateUniqueSlug(string $title, int $ignoreId = null): string
    {
        $baseSlug = Str::slug($title);

        $query = Page::where('slug', 'LIKE', $baseSlug . '%');

        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }

        $count = $query->count();

        return $count ? $baseSlug . '-' . $count : $baseSlug;
    }
}

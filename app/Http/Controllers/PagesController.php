<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function footer()
    {
        $pages = Page::where('type', 'footer')->get();
        return view('backend.pages.footer.footerPages', compact([
            'pages',
        ]));
    }

    public function footer_pages_edit($id)
    {
        $page = Page::findOrFail($id);
        return view('backend.pages.footer.footer_pages_edit', compact([
            'page',
        ]));
    }

    public function footer_pages_update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $page = Page::where('type', 'footer')->where('id', $id)->first();
        $page->update([
            'content' => $request->content
        ]);

        return redirect()->route('admin.pages.footer.index')->with('success', $page->name . ' Page Update Successfully');
    }
}

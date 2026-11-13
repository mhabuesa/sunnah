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
}
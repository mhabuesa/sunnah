<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function about()
    {
        $content = Page::where('type', 'footer')->where('name', 'about us')->first();
        return view('frontend.information.about', compact([
            'content'
        ]));
    }

    public function contact()
    {
        $content = Page::where('type', 'footer')->where('name', 'contact us')->first();
        return view('frontend.information.contact', compact([
            'content'
        ]));
    }



    public function termsAndConditions()
    {
        $content = Page::where('type', 'footer')->where('name', 'Terms & Conditions')->first();
        return view('frontend.information.terms', compact([
            'content'
        ]));
    }

    public function privacy()
    {
        $content = Page::where('type', 'footer')->where('name', 'Privacy Policy')->first();
        return view('frontend.information.privacy', compact([
            'content'
        ]));
    }

    public function footer_page($slug)
    {
        $content = Page::where('type', 'footer')
            ->where('name', ucwords(str_replace('-', ' ', $slug)))
            ->firstOrFail();

        return view('frontend.information.footer_page', compact('content'));
    }
}

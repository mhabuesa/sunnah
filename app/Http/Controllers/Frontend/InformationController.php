<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function about()
    {
        return view('frontend.information.about');
    }

    public function contact()
    {
        return view('frontend.information.contact');
    }

    public function companyInformation()
    {
        return view('frontend.information.company-information');
    }

    public function termsAndConditions()
    {
        return view('frontend.information.terms');
    }
}
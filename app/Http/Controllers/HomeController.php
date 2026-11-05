<?php

namespace App\Http\Controllers;

use App\Traits\FraudCheckerTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Raziul\Sslcommerz\Facades\Sslcommerz;

class HomeController extends Controller
{
    use FraudCheckerTrait;
    public function dashboard()
    {
        return view("backend.index");
    }


    public function fraudCheck()
    {
        $data = $this->checkFraud('01712803497');
        dd($data);
    }
    public function CheckBalance() {}

    public function success(Request $request)
    {
        dd($request->all());
    }
}

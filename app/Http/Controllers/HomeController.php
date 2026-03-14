<?php

namespace App\Http\Controllers;

use App\Traits\FraudCheckerTrait;
use Illuminate\Http\Request;

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
}
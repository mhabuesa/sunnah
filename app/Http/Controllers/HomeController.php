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
    public function CheckBalance()
    {
        $token = 'oat_MzIy.YnpGNkRmVXhjcFBrcks3d1laNXROWWY5Z1FuN3c1d0hKVkkzczN3MzE1OTcwNDIxMzc';
        $url = 'https://api.awajdigital.com/api/voices';

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $token,
            'Accept: application/json'
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);
        dd($result);
    }
}
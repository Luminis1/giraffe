<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Advert;


class IndexController extends Controller
{
    public function index(Request $request)
    {
        if(empty($request['page'])) {
            $start = 0;
        }else{
            $start = ($request['page'] * 5 - 5);
        }

        $len = intval(ceil(count(Advert::all()) / 5));
        $ads = Advert::getAdverts($start);

        return view('index',[
            'auth' => Auth::check(),
            'ads' => $ads,
            'len' => $len,
            'user_id' => Auth::user()->id
        ]);
    }
    public function showAd(Request $request)
    {
        $ad = Advert::find($request['id']);

        return view('ad',[
            'ad' => $ad,
            'auth' => Auth::check(),
            'user_id' => Auth::user()->id
        ]);
    }
}

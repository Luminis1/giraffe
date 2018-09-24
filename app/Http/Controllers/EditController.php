<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Advert;

class EditController extends Controller
{
    public function createAd(Request $request)
    {
        $ad = Advert::find($request['id']);
        if (!empty($request) && Auth::user()->id == $ad['author_id']) {
            return view('edit', [
                'auth' => Auth::check(),
                'ad' => $ad
            ]);
        }else {
            return view('edit', [
                'auth' => Auth::check()
            ]);
        }
    }

    public function saveAd(Request $request)
    {
        $author_id = null;
        if(!empty(Auth::user()->id)){
            $author_id = Auth::user()->id;
        }
        if($request['ad-id'] != null){
            $ad = Advert::find($request['ad-id']);
            $ad->title = $request['title'];
            $ad->description = $request['description'];
            $ad->save();
        }else{
            Advert::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'author_id' => $author_id
        ]);
        }
        return redirect('/');
    }

    public function deleteAd(Request $request)
    {
        Advert::destroy($request['id']);
        return redirect('/');
    }
}

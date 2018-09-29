<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Advert;
use Illuminate\Support\Facades\Validator;

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
        } else {
            return view('edit', [
                'auth' => Auth::check()
            ]);
        }
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:10',
            'description' => 'required|string|max:10',
        ]);
    }

    public function saveAd(Request $request)
    {
        $this->validator($request->all())->validate();


        $author_id = null;
        $ad = Advert::find($request['ad-id']);
        if (!empty(Auth::user()->id)) {
            $author_id = Auth::user()->id;
        }
        if ($request['ad-id'] != null ) {
            if ( !empty($ad->author_id == Auth::user()->id)) {
                $ad->title = $request['title'];
                $ad->description = $request['description'];
                $ad->save();
            } else {
                return response('Unauthorized.', 403);
            }
        } else {
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
        $ad = Advert::find($request['id']);

        if ($request['id'] != null && !empty($ad->author_id == Auth::user()->id)) {
            Advert::destroy($request['id']);
            return redirect('/');
        } else {
            return response('Unauthorized.', 403);
        }



    }
}

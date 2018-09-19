<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Advert extends Model
{
    protected $table = "adverts";
    protected $fillable = ['title', 'description', 'author_id'];

    public static function getAdverts($start)
    {
        $result = DB::table('adverts')
            ->join('users','adverts.author_id', '=', 'users.id' )
            ->select('adverts.*','users.email')
            ->offset($start)
            ->limit(5)
            ->get();

        return $result;
    }

}

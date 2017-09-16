<?php namespace App\Http\Widgets;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Orchid\Widget\Service\Widget;

class ScriptUrlWidget extends Widget {

    /**
     * Class constructor.
     */
    public function __construct(){

    }

    /**
     * @return mixed
     */
     public function run(){
         if(!is_null(Auth::user()->getRoles()->shift())) {
             $url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/quote-system/'.Auth::user()->getRoles()->shift()->slug.'/js';
             return view('scripturlwidget', ['url' => $url]);
         }
     }

}
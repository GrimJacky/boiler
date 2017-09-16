<?php

namespace App\Http\Controllers\Quote;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Orchid\CMS\Core\Models\Page;

class ScriptController extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
    }

    public function script($company_name,  Request $request)
    {
        return str_replace('((host))', $request->server()['REQUEST_SCHEME'].'://'.$request->server()['HTTP_HOST'], str_replace('((company_name))', $company_name, file_get_contents(__DIR__.'/../../../../public/js/calculator.js')));
    }
}

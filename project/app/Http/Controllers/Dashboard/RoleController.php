<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Orchid\Alert\Facades\Alert;
use Orchid\CMS\Core\Models\Page;
use Orchid\Platform\Core\Models\Role;
use Orchid\Platform\Http\Controllers\Controller;

class RoleController extends Controller
{
    public $locales;

    public function __construct()
    {
        //$this->checkPermission('dashboard.company.posts');
        $this->locales = collect(config('cms.locales'));
    }

    public function show()
    {
        return view('company', []);
    }

    public function update(Request $request)
    {
        $data = Validator::make($request->all(), [
            'company_name' => 'required',
            'slug' => 'unique:roles'
        ]);

        if($data->fails())
        {
            Alert::error('Slug must be unique');
            return back();
        }
        else
        {
            Role::create([
                'name'=>$request->company_name,
                'slug'=>$request->slug,
                'permissions'=>json_decode('{"dashboard.calculator":"1","dashboard.index":"1","dashboard.posts":"1","dashboard.posts.type.boilers":"1","dashboard.posts.type.order":"1","dashboard.tools.attachment":"1","dashboard.tools.media":"1"}')
            ]);

            return redirect(route('dashboard.systems.users.create'));
        }
    }
}

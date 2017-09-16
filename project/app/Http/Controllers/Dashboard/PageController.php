<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Alert\Facades\Alert;
use Orchid\CMS\Core\Models\Page;
use Orchid\Platform\Core\Models\Role;
use Orchid\Platform\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * @var
     */
    public $locales;

    /**
     * PostController constructor.
     */
    public function __construct()
    {
        //$this->checkPermission('dashboard.company.posts');
        $this->locales = collect(config('cms.locales'));
    }

    /**
     * @param Page $page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Page $page = null)
    {
        $old = $page;
        $page = Page::where('slug', '=', $page->slug_prefix . '-' . $page->slug)->first();
        return view('calculator', [
            'type'    => is_null($page) ? $old->getBehaviorObject($old->slug) : $page->getBehaviorObject($old->slug),
            'locales' => $this->locales,
            'post'    => is_null($page) ? $old : $page,
        ]);
    }

    /**
     * @param         $page
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Page $page, Request $request)
    {
        $prefix = $page->toArray()['slug_prefix'];
        $copy = $page;
        $exist = Page::where('slug', '=', $prefix. '-' . $copy->slug)->first();

        if(is_null($exist))
        {
            $page = new Page();
            $type = $page->getBehaviorObject($copy->slug);
            $page->fill($request->all());
            $page->fill([
                'user_id'    => Auth::user()->id,
                'type'       => 'page',
                'slug'       => $prefix. '-' . $copy->slug,
                'status'     => 'publish',
                'options'    => [],
                'publish_at' => Carbon::now(),
            ]);

            if(isset($page->toArray()['slug_prefix']))
            {
                unset($page->slug_prefix);
            }

            $page->save();
        }
        else
        {
            $exist->content = $request->toArray()['content'];
            $exist->save();
            $page = $exist;
            $type = $page->getBehaviorObject($copy->slug);
        }


        foreach ($type->getModules() as $module) {
            $module = new $module();
            $module->save($type, $page);
        }

        Alert::success(trans('cms::common.alert.success'));

        return back();
    }
}

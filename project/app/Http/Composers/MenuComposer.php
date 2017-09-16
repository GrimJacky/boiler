<?php
namespace App\Http\Composers;

use Illuminate\Support\Facades\Auth;
use Orchid\Platform\Core\Models\Role;
use Orchid\Platform\Kernel\Dashboard;

class MenuComposer
{
    /**
     * MenuComposer constructor.
     *
     * @param Dashboard $dashboard
     */
    public function __construct(Dashboard $dashboard)
    {
        $this->dashboard = $dashboard;
    }

    /**
     *  Register dashboard menu
     */
    public function compose()
    {
        dd($this->dashboard->menu);
        $this->dashboard->menu->add('Main', [
            'slug'       => 'calculator-settings',
            'icon'       => 'icon-settings',
            'route'      => '#',
            'label'      => 'Settings',
            'childs'     => true,
            'main'       => true,
            'active'     => 'dashboard.calculator.*',
            'permission' => 'dashboard.calculator',
            'sort'       => 1,
        ]);

        $allPage = $this->dashboard->getStorage('pages')->all();

        foreach ($allPage as $key => $page) {
            $postObject = [
                'slug'       => $page->slug,
                'icon'       => $page->icon,
                'route'      => route('dashboard.calculator.pages.show', [$page->slug]),
                'label'      => $page->name,
                'childs'     => false,
                'permission' => 'dashboard.calculator',
                'sort'       => $key,
                'groupname'  => $page->groupname,
                'divider'    => $page->divider,
            ];

            if (reset($allPage) == $page) {
                $postObject['groupname'] = trans('cms::menu.static pages');
            } elseif (end($allPage) == $page) {
                $postObject['divider'] = true;
            }

            $this->dashboard->menu->add('calculator-settings', $postObject);
        }

        $this->dashboard->menu->add('Main', [
            'slug'       => 'company-create',
            'icon'       => 'icon-user',
            'route'      => route('dashboard.create.company') ,
            'label'      => 'Create company',
            'childs'     => false,
            'main'       => true,
            'active'     => 'dashboard.create.company',
            'permission' => 'dashboard.create.company',
            'sort'       => 1,
        ]);

        $postMenu = [
            'slug'       => 'Posts',
            'icon'       => 'icon-notebook',
            'route'      => '#',
            'label'      => 'Boilers and Enquiries',//trans('cms::menu.posts'),
            'childs'     => true,
            'main'       => true,
            'active'     => 'dashboard.posts.*',
            'permission' => 'dashboard.posts',
            'sort'       => 100,
        ];

        $this->dashboard->menu->add('Main', $postMenu);
    }
}

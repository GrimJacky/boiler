<?php

namespace App\Observers;

use Orchid\CMS\Core\Models\Post;
use Orchid\Platform\Core\Models\Role;
use Orchid\Platform\Core\Models\User;

class RoleObserver
{
    public function created(Role $role)
    {
       // dd($role);
    }

    public function updated(Role $role)
    {
      /*  dd($role);
        $company = $user->getRoles()->first();
        $company_users = $company->getUsers();

        dd($company_users);

        $root = Role::where('slug', '=', 'root')->first();
        $users = $root !== null ? $root->getUsers() : [];
        if(!empty($users))
        {
            $user_ids = [];
            foreach ($users as $user_object)
            {
                array_push($user_ids, $user_object->id);
            }
            $posts = Post::whereIn('user_id', $user_ids)->get();
            dd($posts);
        }*/
    }

    public function deleted()
    {

    }
}
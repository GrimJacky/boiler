<?php

namespace App\Listeners;

use Orchid\CMS\Core\Models\Post;
use Orchid\Platform\Core\Models\Role;
use Orchid\Platform\Events\Systems\Roles\AddRoleEvent;

class CompanyNameListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  Event  $event
     * @return void
     */
    public function handle(AddRoleEvent $event)
    {
        $company = $event->roles->first();
        $company_users = $company->getUsers();
        if(count($company_users) === 1 and $event->user->email === $company_users[0]->email and count(Post::where('user_id', $event->user->id)->get()) === 0)
        {
            $root_users = [];
            foreach (Role::where('slug', 'root')->first()->getUsers() as $root_user) {
                array_push($root_users, $root_user->id);
            }
            $default_pages = Post::whereIn('user_id', $root_users)->get();
            foreach ($default_pages as $post)
            {
                $new = new Post();
                $new->fill($post->toArray());
                $new->slug = str_replace('root-', $event->roles->first()->slug . '-', $post->slug);
                $new->user_id = $event->user->id;
                $new->save();
            }
        }
    }
}

<?php

namespace App\Observers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Orchid\CMS\Core\Models\Post;
use Orchid\Platform\Core\Models\Role;

class PostObserver
{
    public function creating(Post $post)
    {
        $this->slugCreater($post);
    }

    public function updating(Post $post)
    {
        $this->slugCreater($post);
    }

    public function saving(Post $post)
    {
     //   $this->slugCreater($post);
    }

    private function slugCreater($post)
    {
        $company = Auth::user()->getRoles()->first();
        $users = [];
        foreach ($company->getUsers() as $user)
        {
            array_push($users, $user->id);
        }

        if(array_search($post->user_id, $users) !== false and stripos($post->slug, $company->slug) === false)
        {
            $post->slug = $company->slug . '-' . $post->slug;
        }
        $post->publish_at = Carbon::now();
        return $post;
    }
}
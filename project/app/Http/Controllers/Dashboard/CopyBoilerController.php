<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Alert\Facades\Alert;
use Orchid\CMS\Core\Models\Page;
use Orchid\CMS\Core\Models\Post;
use Orchid\Platform\Core\Models\Role;
use Orchid\Platform\Http\Controllers\Controller;

class CopyBoilerController extends Controller
{
    public function copyBoiler($id, $post)
    {
        if($post !== "0")
        {
            $original_post = Post::where('id', $id)->first();
            $copy_post = Post::where('id', $post)->first();
            $copy_post->content = $original_post->content;
        }
        else
        {
            $company = Auth::user()->getRoles()->first();
            $original_post = Post::where('id', $id)->first();
            $copy_post = new Post();
            $copy_post->user_id = Auth::user()->id;
            $copy_post->type = $original_post->type;
            $copy_post->slug = $company->slug . '-' . Carbon::now()->format('U');
            $copy_post->content = $original_post->content;
            $copy_post->options = $original_post->options;
        }

        $copy_post->user_id = Auth::user()->id;
        $copy_post->save();
        return  redirect('dashboard/posts/'.$copy_post->type.'/'.$copy_post->id.'/edit');
    }
}

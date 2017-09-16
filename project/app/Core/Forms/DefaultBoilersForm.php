<?php
namespace App\Core\Forms;

use Illuminate\View\View;
use Orchid\CMS\Behaviors\Many as PostBehaviors;
use Orchid\CMS\Core\Models\Post;
use Orchid\Platform\Core\Models\Role;
use Orchid\Platform\Forms\Form;

class DefaultBoilersForm extends Form{

    /**
     * @var string
     */
    public $name = 'Default boilers';

    /**
     * Display Base Options.
     *
     * @param PostBehaviors|null $type
     * @param Post|null          $post
     *
     * @return \Illuminate\Contracts\View\Factory|View
     *
     * @internal param null $type
     */
    public function get(PostBehaviors $type = null, Post $current = null): View
    {
        $users = [];
        foreach (Role::where('slug', 'root')->first()->getUsers() as $user)
        {
            array_push($users, $user->id);
        }

        $defaults = [];
        foreach(Post::whereIn('user_id', $users)->get() as $post)
        {
            $post->image = is_null($post->attachment()->first()) ? false : $post->attachment()->first()->url('small');
            array_push($defaults, $post);
        }

        return view('forms.default-boiler', [
            'boilers' => $defaults,
            'post' => is_null($current) ? 0 : $current->id
        ]);
    }
}

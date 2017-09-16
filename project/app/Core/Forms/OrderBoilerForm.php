<?php
namespace App\Core\Forms;

use Illuminate\View\View;
use Orchid\CMS\Behaviors\Many as PostBehaviors;
use Orchid\CMS\Core\Models\Post;
use Orchid\Platform\Forms\Form;

class OrderBoilerForm extends Form{

    /**
     * @var string
     */
    public $name = 'Boiler';

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
    public function get(PostBehaviors $type = null, Post $post = null): View
    {
        $options = $post ? $post->options : [];
        if(key_exists('boiler', $options)){
            $options = $options['boiler'];
        }

        return view('forms.order-boiler', $options);
    }
}

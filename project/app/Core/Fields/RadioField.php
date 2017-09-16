<?php

namespace App\Core\Fields;

use Illuminate\Support\Collection;
use Orchid\Platform\Field\Field;

class RadioField extends Field
{
    /**
     * @var string
     */
    public $view = 'fields.warranty';

    /**
     * Display Base Options.
     *
     * @return \Illuminate\Contracts\View\View
     *
     * @internal param null $type
     * @internal param null|Post $post
     */
    public function create(Collection $attributes, $data = null)
    {
        if (is_null($data))
        {
            $data = collect();
        }

        $attributes->put('data', $data);
        $attributes->put('config', collect(config($attributes->get('config'))));
        $attributes->put('slug', str_slug($attributes->get('name')));

        return view($this->view, $attributes);
    }
}
<?php

namespace App\Core\Fields;

use Illuminate\Support\Collection;
use Orchid\CMS\Core\Models\Post;
use Orchid\Platform\Field\Field;

class PackagesField extends Field
{
    /**
     * @var string
     */
    public $view = 'fields.packages';

    /**
     * @param Collection $attributes
     * @param null       $data
     *
     * @return mixed
     */
    public function create(Collection $attributes, $data = null)
    {
        if(is_null($attributes['value']) or !key_exists(str_slug($attributes->get('slug')), $attributes['value'])){
            $attributes->put('data', collect([]));
        }
        else {
            $attributes->put('data', $attributes['value'][str_slug($attributes->get('slug'))]);
        }

        return view($this->view, $attributes);
    }
}

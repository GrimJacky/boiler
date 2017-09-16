<?php

namespace App\Core\Behaviors\Single;

use Orchid\CMS\Behaviors\Single;
//use Orchid\Http\Forms\Posts\UploadPostForm;

class CreditScreen extends Single
{
    /**
     * @var string
     */
    public $name = 'Finance options';

    /**
     * @var string
     */
    public $slug = 'finance';

    /**
     * Slug url /news/{name}.
     *
     * @var string
     */
    public $slugFields = 'name';

    /**
     * Rules Validation.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'id' => 'sometimes|integer|unique:posts',
            'content.*.title' => 'required|string',
            'content.*.button' => 'required|string',
        ];
    }

    /**
     * @return array
     */
    public function fields() : array
    {
        return [
            'available'    => 'tag:checkbox|name:available|required|placeholder:Available|default:1|title:Available',
            'isopen'       => 'tag:checkbox|name:isopen|required|placeholder:Open by default|default:1|title:Open by default',
            'apr'          => 'tag:input|type:number|name:apr|max:255|required|title:APR %',
            'deposit'      => 'tag:input|type:number|name:deposit|max:255|required|title:Default deposit',
            'years'        => 'tag:input|type:number|name:years|max:255|required|title:Default year',
            'title'        => 'tag:input|type:text|name:title|max:255|title:Title',
            'introduction' => 'tag:textarea|name:introduction|max:255|required|rows:5|title:Introduction',
            'button'       => 'tag:input|type:text|name:button|max:50|required|title:Button',
        ];
    }

    /**
     * @return array
     */
    public function modules() : array
    {
        return [];
    }
}

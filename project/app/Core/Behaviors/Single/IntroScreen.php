<?php

namespace App\Core\Behaviors\Single;

use Orchid\CMS\Behaviors\Single;
//use Orchid\Http\Forms\Posts\UploadPostForm;

class IntroScreen extends Single
{
    /**
     * @var string
     */
    public $name = 'Intro';

    /**
     * @var string
     */
    public $slug = 'intro-screen';

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
            'title'        => 'tag:input|type:text|name:title|max:255|required|title:Title',
            'text'         => 'tag:input|type:text|name:text|max:255|title:Message',
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

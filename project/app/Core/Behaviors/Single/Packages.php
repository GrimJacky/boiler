<?php

namespace App\Core\Behaviors\Single;

use Orchid\CMS\Behaviors\Single;
use Orchid\CMS\Http\Forms\Posts\UploadPostForm;

class Packages extends Single
{
    /**
     * @var string
     */
    public $name = 'Packages';

    /**
     * @var string
     */
    public $slug = 'packages';

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
            'id'             => 'sometimes|integer|unique:posts',
        ];
    }

    /**
     * @return array
     */
    public function fields() : array
    {
        return [
            'standard' => 'tag:package|name:package|slug:standard|title:Standard package includes',
            'premium' => 'tag:package|name:package|slug:premium|title:Premium package includes',
        ];
    }

    /**
     * @return array
     */
    public function modules() : array
    {
        return [
            //UploadPostForm::class,
        ];
    }
}

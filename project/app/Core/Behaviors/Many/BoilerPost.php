<?php

namespace App\Core\Behaviors\Many;

use App\Core\Forms\DefaultBoilersForm;
use App\Http\Filters\CompanyFilter;
use Orchid\CMS\Behaviors\Many;
use Orchid\CMS\Http\Forms\Posts\BasePostForm;
use Orchid\CMS\Http\Forms\Posts\UploadPostForm;

class BoilerPost extends Many
{
    /**
     * @var string
     */
    public $name = 'Boilers';

    /**
     * @var string
     */
    public $description = 'All boilers';

    /**
     * @var string
     */
    public $slug = 'boilers';

    /**
     * @var string
     */
    public $icon = 'fa fa-thermometer-empty';

    /**
     * Slug url /news/{name}.
     *
     * @var string
     */
    public $slugFields = 'name';

    /**
     * @var array
     */
    public $filters = [
        CompanyFilter::class
    ];

    /**
     * Rules Validation.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'id'             => 'sometimes|integer|unique:posts',
            'content.*.name' => 'required|string',
            'content.*.body' => 'required|string',
        ];
    }

    /**
     * @return array
     */
    public function fields() : array
    {
        return [
            'name'         => 'tag:input|type:text|name:name|max:255|required|title:Boiler name',
            'price'        => 'tag:input|type:number|name:price|max:255|required|title:Boiler price',
            'warranty'     => 'tag:radio|name:warranty|required|config:warranty|title:Warranty',
            'install-type' => 'tag:radio|name:install-type|required|config:install-type|title:Install type',
            'property-size'=> 'tag:radio|name:property-size|required|config:property-size|title:Property size',
            'pay-type'     => 'tag:radio|name:pay-type|required|config:type|title:Type',
            'body'         => 'tag:wysiwyg|name:body|max:255|required|rows:10|title:Boiler description',
        ];
    }

    /**
     * @return array
     */
    public function modules() : array
    {
        return [
            DefaultBoilersForm::class,
            UploadPostForm::class,
        ];
    }

    /**
     * Grid View for post type.
     */
    public function grid() : array
    {
        return [
            'name'         => 'Boiler name',
            'pay-type'     => 'Type',
            'install-type' => 'Install type',
            'warranty'     => 'Warranty',
            'property-size'=> 'Property size',
            'price'        => 'Price',
        ];
    }
}

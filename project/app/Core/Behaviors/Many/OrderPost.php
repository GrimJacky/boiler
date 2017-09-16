<?php

namespace App\Core\Behaviors\Many;

use App\Core\Forms\OrderBoilerForm;
use Orchid\CMS\Behaviors\Many;
use App\Http\Filters\CompanyFilter;

class OrderPost extends Many
{
    /**
     * @var string
     */
    public $name = 'Orders';

    /**
     * @var string
     */
    public $slug = 'order';

    /**
     * Slug url /news/{name}.
     *
     * @var string
     */
    public $slugFields = 'name';

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
            'id' => 'sometimes|integer|unique:posts',
            'content.*.name' => 'required|string',
            'content.*.email' => 'required|string|email',
            'content.*.phone' => 'required|string',
            'content.*.address' => 'required',
            'content.*.house' => 'required|string',
            'content.*.bedrooms' => 'required|string',
            'content.*.bathrooms' => 'required|string',
            'content.*.cylinder' => 'required|string',
        ];
    }

    /**
     * @return array
     */
    public function fields() : array
    {
        return [
            'name'        => 'tag:input|type:text|name:name|max:255|required|title:Customer name',
            'email'       => 'tag:input|type:email|name:email|max:255|required|title:Customer email',
            'phone'       => 'tag:input|type:text|name:phone|max:255|required|title:Customer phone',
            'address'     => 'tag:textarea|name:address|required|rows:5|title:Customer address',
            'house'       => 'tag:input|type:text|name:house|max:255|required|title:Customer house type',
            'bedrooms'    => 'tag:input|type:text|name:bedrooms|max:255|required|title:Customer bedrooms',
            'bathrooms'   => 'tag:input|type:text|name:bathrooms|max:255|required|title:Customer bathrooms',
            'cylinder'    => 'tag:input|type:text|name:cylinder|max:255|required|title:Customer cylinder',
        ];
    }

    /**
     * @return array
     */
    public function modules() : array
    {
        return [
            OrderBoilerForm::class
        ];
    }

    /**
     * Grid View for post type.
     */
    public function grid() : array
    {
        return [
            'name'       => 'Name',
            'phone'       => 'Phone',
            'email'       => 'Email',
            'created_at' => 'Date',
        ];
    }
}

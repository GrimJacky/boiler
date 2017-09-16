<?php

namespace App\Core\Behaviors\Single;

use Orchid\CMS\Behaviors\Single;
//use Orchid\Http\Forms\Posts\UploadPostForm;

class EmailTemplate extends Single
{
    /**
     * @var string
     */
    public $name = 'Quote Emails';

    /**
     * @var string
     */
    public $slug = 'quote-email-template';

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
            //'id' => 'sometimes|integer|unique:posts',
            'content.*.from' => 'required|string',
            'content.*.reply_to' => 'required|string',
            'content.*.subject' => 'required|string',
            'content.*.body' => 'required|string',
        ];
    }

    /**
     * @return array
     */
    public function fields() : array
    {
        return [
            'from'        => 'tag:input|type:text|name:from|max:255|required|title:From',
            'reply_to'    => 'tag:input|type:email|name:reply_to|max:255|required|title:Reply-to',
            'subject'     => 'tag:input|type:text|name:subject|max:255|required|title:Subject',
            'body'        => 'tag:wysiwyg|name:body|max:255|required|rows:10',
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

<?php

namespace App\API\Input;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class MessageInput extends GraphQLType
{
    protected $inputObject = true;

    protected $attributes = [
        'name' => 'MessageInput'
    ];

    public function fields()
    {
        return [
            'to' => [
                'name' => 'to',
                'type' => Type::string()
            ],
            'from' => [
                'name' => 'from',
                'type' => Type::string()
            ],
            'subject' => [
                'name' => 'subject',
                'type' => Type::string()
            ],
            'text' => [
                'name' => 'text',
                'type' => Type::string()
            ]
        ];
    }
}
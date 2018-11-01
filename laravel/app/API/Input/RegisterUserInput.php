<?php

namespace App\API\Input;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class RegisterUserInput extends GraphQLType {

    protected $inputObject = true;

    protected $attributes = [
        'name' => 'RegisterUserInput'
    ];

    public function fields()
    {
        return [
            'first_name' => [
                'name' => 'first_name',
                'type' => Type::string()
            ],
            'last_name' => [
                'name' => 'last_name',
                'type' => Type::string()
            ],
            'mail_id' => [
                'name' => 'mail_id',
                'type' => Type::string()
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::string()
            ],
            'nick_name' => [
                'name' => 'nick_name',
                'type' => Type::string()
            ]
        ];
    }
}
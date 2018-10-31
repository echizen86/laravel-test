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
                'type' => Type::nonNull(Type::string())
            ],
            'last_name' => [
                'name' => 'last_name',
                'type' => Type::nonNull(Type::string())
            ],
            'company_name' => [
                'name' => 'company_name',
                'type' => Type::nonNull(Type::string())
            ],
            'player_id' => [
                'name' => 'player_id',
                'type' => Type::string()
            ],
            'platform' => [
                'name' => 'platform',
                'type' => Type::string()
            ],
            'device_model' => [
                'name' => 'device_model',
                'type' => Type::string()
            ],
            'device_os' => [
                'name' => 'device_os',
                'type' => Type::string()
            ],
            'time_zone' => [
                'name' => 'time_zone',
                'type' => Type::string()
            ]
        ];
    }
}
<?php

namespace App\API\Input;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UpdateProfileInput extends GraphQLType {

    protected $inputObject = true;

    protected $attributes = [
        'name' => 'UpdateProfileInput'
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
            'company_name' => [
                'name' => 'company_name',
                'type' => Type::string()
            ]
        ];
    }
}
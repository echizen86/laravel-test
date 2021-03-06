<?php

namespace App\API\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use App\API\Type\DateTimeType as Timestamp;
use Rebing\GraphQL\Support\Facades\GraphQL;

class UserType extends GraphQLType
{
    /**
     * @var array
     */
    protected $attributes = [
        'name' => 'User',
        'description' => 'A user',
    ];

    /**
     * @return array
     */
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::string())
            ],
            'messages' => [
                'type' => Type::listOf(GraphQL::type('Message')),
                'description' => 'The user messages'
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'User Email'
            ],
            'sub' => [
                'type' => Type::string()
            ],
            'first_name' => [
                'type' => Type::string()
            ],
            'last_name' => [
                'type' => Type::string()
            ],
            'isRegistered' => [
                'type' => Type::boolean()
            ],
            'nick_name' => [
                'type' => Type::string()
            ],
            'created_at' => [
                'type' => Timestamp::type()
            ],
            'updated_at' => [
                'type' => Timestamp::type()
            ],
        ];
    }

}
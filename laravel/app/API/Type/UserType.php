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
        'name'          => 'User',
        'description'   => 'A user',
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
            'email' => [
                'type' => Type::nonNull(Type::string())
            ],
            'profile_id' => [
                'type' => Type::string()
            ],
            'first_name' => [
                'type' => Type::nonNull(Type::string())
            ],
            'last_name' => [
                'type' => Type::nonNull(Type::string())
            ],
            'sub' => [
                'type' => Type::string()
            ],
            'player_id' => [
                'type' => Type::string()
            ],
            'platform' => [
                'type' => Type::string()
            ],
            'device_model' => [
                'type' => Type::string()
            ],
            'device_os' => [
                'type' => Type::string()
            ],
            'time_zone' => [
                'type' => Type::string()
            ],
            'company_name' => [
                'type' => Type::nonNull(Type::string())
            ],
            'isRegistered' => [
                'type' => Type::boolean()
            ],
            'extensions' => [
                'type' => Type::listOf(GraphQL::type('Extension'))
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
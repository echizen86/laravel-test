<?php

namespace App\API\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use App\API\Type\DateTimeType as Timestamp;
use Rebing\GraphQL\Support\Facades\GraphQL;

class MessageType extends GraphQLType
{
    /**
     * @var array
     */
    protected $attributes = [
        'name'          => 'Message',
        'description'   => 'A message',
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
            'user_id' => [
                'type' => Type::string()
            ],
            'to' => [
                'type' => Type::string()
            ],
            'from' => [
                'type' => Type::string()
            ],
            'text' => [
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
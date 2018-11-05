<?php

namespace App\API\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use App\Models\User;
use App\Http\Controllers\MessageController;

class MessageMutation extends Mutation
{
    protected $attributes = [
        'name' => 'MessageMutation'
    ];

    public function type()
    {
        return GraphQL::type('Message');
    }

    public function args()
    {
        return [
            'id' => [
                'type' => Type::string()
            ],
            'input' => [
                'type' => GraphQL::type('MessageInput')
            ]
        ];
    }

    public function resolve($root, $args)
    {
        
        return MessageController::recievedMailGQL($args);
    }
}
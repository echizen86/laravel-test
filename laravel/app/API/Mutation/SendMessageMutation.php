<?php

namespace App\API\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use App\Models\Message as Model;
use App\Models\Message;

class SendMessageMutation extends Mutation
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
        $m = new Message();
        $m->to = $args['input']['to'];
        $m->from = $args['input']['from'];
        $m->subject = $args['input']['subject'];
        $m->text = $args['input']['text'];
        return $m->sendMessage($m);
    }
}
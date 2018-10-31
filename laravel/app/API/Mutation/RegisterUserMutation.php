<?php

namespace App\API\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use App\Models\User;

class RegisterUserMutation extends Mutation {

    protected $attributes = [
        'name' => 'RegisterUserMutation'
    ];

    public function type()
    {
        return GraphQL::type('User');
    }

    public function args()
    {
        return [
            'id' => [
                'type' => Type::string()
            ],
            'input' => [
                'type' => GraphQL::type('RegisterUserInput')
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $args['input']['isRegistered'] = true;
        User::where('id', $args['id'])->update($args['input']);
        return User::where('id', $args['id'])->first();
    }

}
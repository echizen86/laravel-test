<?php

namespace App\API\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use App\Models\User as Model;
use Auth;

class UpdateProfileMutation extends Mutation {

    protected $attributes = [
        'name' => 'UpdateProfileMutation'
    ];

    public function type()
    {
        return GraphQL::type('User');
    }

    public function args()
    {
        return [
            'input' => [
                'type' => GraphQL::type('UpdateProfileInput')
            ]
        ];
    }

    public function resolve($root, $args)
    {
        Model::where('id', Auth::user()->id)->update($args['input']);
        return Model::where('id', Auth::user()->id)->first();
    }

}
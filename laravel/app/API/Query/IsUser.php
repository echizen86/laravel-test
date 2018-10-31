<?php

namespace App\API\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Query;
use Auth;

use App\Models\User as Model;

class IsUser extends Query
{

    public function authorize(array $args)
    {
        return true;
    }

    protected $attributes = [
        'name' => 'Check If Email Is A User'
    ];

    public function type()
    {
        return GraphQL::type('User');
    }


    public function args()
    {
        return [
            'email' => [
                'name' => 'email',
                'type' => Type::nonNull(Type::string())
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        return Model::where('email', $args['email'])->first();
    }
}
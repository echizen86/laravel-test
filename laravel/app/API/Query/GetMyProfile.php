<?php

namespace App\API\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Query;
use Auth;

use App\Models\User as Model;

class GetMyProfile extends Query
{

    public function authorize(array $args)
    {
        return Auth::check();
    }

    protected $attributes = [
        'name' => 'Get User Profile'
    ];

    public function type()
    {
        return GraphQL::type('User');
    }


    public function args()
    {
        return [];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        return Model::where('id', Auth::user()->id)->first();
    }
}
<?php

namespace App\API\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Query;

use App\Models\Message as Model;

class GetMyMessages extends Query
{   
    public function authorize(array $args)
    {
        return true;
    }

    protected $attributes = [
        'to' => 'User destination',
        'from' => 'User who sends it',
        'text' => 'Text of message'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Message'));
    }


    public function args()
    {
        return [
            'to' => ['name' => 'to', 'type' => Type::string()],
            'from' => ['name' => 'from', 'type' => Type::string()],
            'subject' => ['name' => 'subject', 'type' => Type::string()],
            'text' => ['name' => 'text', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args)
    {
        // return Model::all();
        return Model::where('to', $args['to'])->get();
    }
}
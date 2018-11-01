<?php

namespace App\API\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Query;
use Auth;

use App\Models\Message as Model;
use App\API\Input\Message;
use App\Http\Controllers\MailController;

class Message extends Query
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
        return GraphQL::type('Message');
    }


    public function args()
    {
        return [
            'to' => ['name' => 'to', 'type' => Type::string()],
            'from' => ['name' => 'from', 'type' => Type::string()],
            'text' => ['name' => 'text', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args)
    {
        return true;
    }
}
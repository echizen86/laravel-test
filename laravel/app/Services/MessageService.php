<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use SebastianBergmann\Environment\Console;
use GuzzleHttp\Client;



class MessageService
{
    public function receivedMessageGQL($message)
    {
        try {
            $sms = new Message();
            $sms->saveMessage($message);
        } catch (Throwable $e) {
            return false;
        }
        $text = 'Success';
        return $text;
    }

    public function receivedMessageREST($message)
    {
        $sms = new Message();
        $obj = $message->all();
        $sms->to = $obj['message']['headers']['to'];
        $sms->from = $obj['message']['headers']['from'];

        $client = new Client();
        $res = $client->request('GET', '' . $obj['storage']['url'] . '', [
            'auth' => ['api', '330b8af8aeb24ec2114d296ea257678d-c9270c97-c2ce62b4']
        ]);

        $json = json_decode($res->getBody()->getContents(), true);
        
        $sms->text = $json['body-html'];

        $sms->saveMessage($sms);

        return $sms;
    }

}


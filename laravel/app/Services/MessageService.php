<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Services\UserService;

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

    /**
     * The JSON in the request is the header of email,
     * to get a body email, is necessary a petition to
     * api of mailgun which return a JSON with complete email
     */
    public function receivedMessageREST($message)
    {
        $sms = new Message();
        $obj = $message->all();
        $sms->to = $obj['message']['headers']['to'];
        $sms->from = $obj['message']['headers']['from'];

        // In the subject come the action to do
        $sms->subject = $obj['message']['headers']['subject'];

        $url = $obj['storage']['url'];

        // get a complete email
        $email = MailService::getEmail($url);
        $json = json_decode($email->getBody()->getContents(), true);
        // get a body from an email
        $sms->text = $json['body-html'];

        $result = 'ERROR';

        // From a subject text it call a appropriate action
        if ($sms->subject == "NAUTA") {
            $result = $sms->nauta($sms);
        }
        if ($sms->subject == "REGISTER") {
            $user = new UserService();
            $result = $user->registerUser($sms);
        }
        if ($sms->subject == "MESSAGE") {
            $result = $sms->message($sms);
        }

        return $result;
    }

}


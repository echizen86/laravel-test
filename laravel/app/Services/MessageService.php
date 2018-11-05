<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Services\UserService;

class MessageService
{
    /**
     * The JSON in the request is the header of email,
     * to get a body email, is necessary a petition to
     * api of mailgun which return a JSON with complete email
     */
    public function receivedMessage($message)
    {
        $sms = new Message();
        $user = new UserService();
        
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

        // From a subject text it call an appropriate action
        if ($sms->subject == "NAUTA") {
            $result = $sms->nauta($sms);
        }
        if ($sms->subject == "REGISTER") {
            $result = $user->registerUser($sms);
        }
        if ($sms->subject == "MESSAGE") {
            $result = $sms->message($sms);
        }
        if ($sms->subject == "UPDATE") {
            $result = $user->updateUser($sms);
        }

        return $result;
    }

}


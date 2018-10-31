<?php
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;
 
class MailController extends Controller
{
    public static function send($sms)
    {
        $objJson = json_encode($sms);

        $objDemo = new \stdClass();
        $objDemo->demo_one = 'Demo One Value';
        $objDemo->demo_two = 'Demo Two Value';
        $objDemo->sender = $sms->from;
        $objDemo->receiver = 'ReceiverUserName';
        $objDemo->text = $objJson;
 
        Mail::to("josecastillo.go@outlook.com")->send(new DemoEmail($objDemo));
    }
}
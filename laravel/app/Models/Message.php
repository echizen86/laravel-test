<?php

namespace App\Models;

use Alsofronie\Uuid\UuidModelTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemoEmail;

class Message extends Model
{
    use Notifiable;
    use UuidModelTrait;

    protected $table = 'messages';
    public $timestamps = true;
    protected $guarded = array('id');
    protected $fillable = array('to', 'from', 'subject', 'text');

    public function Users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    /**
     * Save a Message and reply to nauta
     */
    public function nauta($message)
    {
        $sms = Message::create(['to' => $message->to, 'from' => $message->from, 'subject' => $message->subject, 'text' => $message->text]);
        Mail::to($this->to)->send(new DemoEmail($this));
        return $this;
    }

    /**
     * Save a message and don't reply because its can access from internet
     */
    public function message($message)
    {
        $sms = Message::create(['to' => $message->to, 'from' => $message->from, 'subject' => $message->subject, 'text' => $message->text]);
        return $this;
    }

    /**
     * test for now!
     */
    public function send()
    {
        $this->to = 'josecastillo.go@outlook.com';
        $this->from = 'carlos@gmail.com';
        $this->text = '{"first_name":"","last_name":"","nick_name":"carlitos"}';
        $this->subject = 'UPDATE';
        Mail::to($this->to)->send(new DemoEmail($this));
        return $this;
    }

    /**
     * Function to send a message from graphql
     */
    public function sendMessage($message)
    {
        $sms = Message::create(['to' => $message->to, 'from' => $message->from, 'subject' => $message->subject, 'text' => $message->text]);
        Mail::to($this->to)->send(new DemoEmail($this));
        return $this;
    }
}
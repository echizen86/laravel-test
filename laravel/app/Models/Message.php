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
    protected $fillable = array('to', 'from', 'text');

    public function Users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    /**
     * Save a Message
     */
    public function saveMessage($message)
    {
        $sms = Message::create(['to' => $message->to, 'from' => $message->from, 'text' => $message->text]);
        Mail::to($this->to)->send(new DemoEmail($this));
        return $this;
    }

}
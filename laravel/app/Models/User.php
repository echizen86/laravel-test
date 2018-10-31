<?php

namespace App\Models;

use Alsofronie\Uuid\UuidModelTrait;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class User extends Model 
{
    use Notifiable;
    use UuidModelTrait;

    protected $table = 'user';
    public $timestamps = true;
    protected $guarded = array('id');
    protected $fillable = array('mail_id', 'sub', 'isRegistered', 'email', 'first_name', 'last_name', 'nick_name');

    public function Messages()
    {
        return $this->belongsToMany('App\Models\Message');
    }

    public function Mail()
    {
        return $this->hasOne('App\Models\MailConfig', 'user_id');
    }

}
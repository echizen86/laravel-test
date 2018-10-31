<?php

namespace App\Models;

use Alsofronie\Uuid\UuidModelTrait;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class MailConfig extends Model 
{
    use Notifiable;
    use UuidModelTrait;

    protected $table = 'mail_config';
    public $timestamps = true;
    protected $guarded = array('id');
    protected $fillable = array('user_id', 'mail_driver', 'mail_host', 'mail_port', 'mail_username', 'mail_password', 'mail_encryption');

    public function User()
    {
        return $this->belongsTo('App\Models\User', 'mail_id');
    }

}
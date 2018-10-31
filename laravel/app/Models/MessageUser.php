<?php

namespace App\Models;

use Alsofronie\Uuid\UuidModelTrait;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Pivot;

class MessageUser extends Pivot 
{

    use Notifiable;
    use UuidModelTrait;

    protected $table = 'message_user';
    public $timestamps = true;
    protected $guarded = array('id');
    protected $fillable = array('message_id', 'user_id');

}
<?php

namespace App\Models;

use Alsofronie\Uuid\UuidModelTrait;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Message extends Model 
{
    use Notifiable;
    use UuidModelTrait;

    protected $table = 'message';
    public $timestamps = true;
    protected $guarded = array('id');
    protected $fillable = array('user_id', 'to', 'from', 'text');

    public function Users()
    {
        return $this->belongsToMany('App\Models\User');
    }

}
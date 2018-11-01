<?php

namespace App\Models;
use Alsofronie\Uuid\UuidModelTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Model 
{

    use Notifiable;
    use UuidModelTrait;

    protected $table = 'users';
    public $timestamps = true;
    protected $guarded = array('id');
    protected $fillable = array('email', 'sub', 'isRegistered', 'first_name', 'last_name', 'nick_name');

    public function Messages()
    {
        return $this->belongsToMany('App\Models\Message');
    }

}
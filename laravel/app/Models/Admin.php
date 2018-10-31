<?php

namespace App\Models;

use Alsofronie\Uuid\UuidModelTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Models\Admin
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $hasAccess
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin whereHasAccess($value)
 */
class Admin extends Authenticatable
{
    use Notifiable;
    use UuidModelTrait;

    protected $table = 'admins';
    public $timestamps = true;
    protected $guarded = array('id');
    protected $fillable = array('name', 'email', 'password', 'hasAccess');
    protected $hidden = array('password', 'remember_token');

}
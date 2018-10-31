<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Alsofronie\Uuid\UuidModelTrait;

/**
 * App\Models\User
 *
 * @property string $id
 * @property string|null $profile_id
 * @property string $sub
 * @property string $email
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $company_name
 * @property int $isRegistered
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Extension[] $Extensions
 * @property-read \App\Models\Profile|null $Profile
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereIsRegistered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereProfileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereSub($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $player_id
 * @property string|null $platform
 * @property string|null $device_model
 * @property string|null $device_os
 * @property string|null $time_zone
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereDeviceModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereDeviceOs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePlayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereTimeZone($value)
 */
class User extends Model 
{

    use UuidModelTrait;

    protected $table = 'users';
    public $timestamps = true;
    protected $guarded = array('id');
    protected $fillable = array(
        'profile_id',
        'sub',
        'email',
        'first_name',
        'last_name',
        'company_name',
        'isRegistered',
        'player_id',
        'platform',
        'device_model',
        'device_os',
        'time_zone',
    );

    public function Profile()
    {
        return $this->belongsTo('App\Models\Profile', 'profile_id');
    }

    public function Extensions()
    {
        return $this->belongsToMany('App\Models\Extension', 'user_extensions', 'user_id', 'extension_id')->where('profile_id', '=', $this->profile_id);
    }

//    public function ExtensionNumbers()
//    {
//        return $this->hasManyThrough('App\Models\ExtensionNumber', 'App\Models\UserExtension', 'user_id', 'extension_id', 'id', 'user_id');
//    }

}
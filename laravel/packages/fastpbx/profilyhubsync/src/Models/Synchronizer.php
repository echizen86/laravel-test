<?php

namespace FastPBX\ProfileHubSync\Models;

use Illuminate\Database\Eloquent\Model;
use Alsofronie\Uuid\UuidModelTrait;
use Laravel\Nova\Actions\Actionable;

class Synchronizer extends Model
{

    use UuidModelTrait, Actionable;

    protected $table = 'synchronizers';
    public $timestamps = true;
    protected $guarded = array('id');
    protected $fillable = array('label','class_name','model_name');

}
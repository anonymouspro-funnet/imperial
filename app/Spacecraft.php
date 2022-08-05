<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spacecraft extends Model
{
    protected $fillable = ['name'];
    protected $hidden = ['id'];

    public function armament()
    {
        return $this->hasMany('App\SpacecraftArmament','spacecraft_id')->select('title', 'qty','spacecraft_id');
    }

    public function getImageAttribute($value)
    {
        return env('APP_URL')."/spacecrafts/" .$value;
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpacecraftArmament extends Model
{
    protected $hidden = ['id','spacecraft_id'];
}

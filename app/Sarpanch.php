<?php

namespace App;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Sarpanch extends Model
{
    use UsesUuid;
    protected $fillable = ['name', 'mobile'];
}

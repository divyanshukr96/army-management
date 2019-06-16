<?php

namespace App;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Sarpanch extends Model implements Auditable
{
    use UsesUuid, SoftDeletes, \OwenIt\Auditing\Auditable;

    protected $fillable = ['name', 'mobile'];
}

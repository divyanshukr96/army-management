<?php

namespace App;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class CSDCard extends Model implements Auditable
{
    use SoftDeletes, UsesUuid, \OwenIt\Auditing\Auditable;

    protected $fillable = ['liquor', 'grocery'];
}

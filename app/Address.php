<?php

namespace App;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Address extends Model implements Auditable
{
    use UsesUuid, \OwenIt\Auditing\Auditable;

    protected $fillable = ['state', 'district', 'pin_code', 'address'];
}

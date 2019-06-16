<?php

namespace App;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Str;

class Account extends Model implements Auditable
{
    use SoftDeletes, UsesUuid, \OwenIt\Auditing\Auditable;

    protected $fillable = ['account_no', 'branch_name', 'ifsc'];

    /**
     * @param $value
     * @return mixed
     */
    public function getIfscAttribute($value)
    {
        return Str::upper($value);
    }

}

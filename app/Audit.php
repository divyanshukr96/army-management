<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Audit extends \OwenIt\Auditing\Models\Audit
{
    public function getAuditableTypeAttribute($value)
    {
        return str_replace('App', '', str_replace("\\", " ", $value));
    }
}

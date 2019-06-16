<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Award extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['title'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class NOKDetails extends Model  implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['name', 'relation', 'mobile'];
}

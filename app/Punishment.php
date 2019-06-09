<?php

namespace App;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Punishment extends Model
{
    use UsesUuid;

    protected $fillable = [
        'place',
        'offence_date',
        'rank',
        'offence',
        'witness',
        'punishment',
        'order_date',
        'by_whom',
        'remark'
    ];
}

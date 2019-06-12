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

    /**
     * @param $value
     */
    public function setOffenceDateAttribute($value)
    {
        $this->attributes['offence_date'] = date('Y-m-d', strtotime($value));
    }

    /**
     * @param $value
     * @return false|string
     */
    public function getOffenceDateAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }

    /**
     * @param $value
     */
    public function setOrderDateAttribute($value)
    {
        $this->attributes['order_date'] = date('Y-m-d', strtotime($value));
    }

    /**
     * @param $value
     * @return false|string
     */
    public function getOrderDateAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }

}

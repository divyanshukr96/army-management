<?php

namespace App;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * @method static whereDate(string $string, \Carbon\CarbonInterface|static $today)
 */
class Punishment extends Model implements Auditable
{
    use UsesUuid, SoftDeletes, \OwenIt\Auditing\Auditable;

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
     * @return BelongsTo
     */
    public function army()
    {
        return $this->belongsTo(Army::class);
    }

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

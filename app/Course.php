<?php

namespace App;

use App\Traits\UsesUuid;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * @property mixed to
 */
class Course extends Model implements Auditable
{
    use UsesUuid, \OwenIt\Auditing\Auditable;

    protected $fillable = ['name', 'grade', 'from', 'to', 'loc'];

    /**
     * @return BelongsTo
     */
    public function army()
    {
        return $this->belongsTo(Army::class);
    }

    /**
     * @return int
     */
    public function getRemainingAttribute()
    {
        return (Carbon::today()->diffInDays(Carbon::parse($this->to)));
    }

}

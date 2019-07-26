<?php

namespace App;

use App\Enums\OtherLeaveType;
use App\Traits\UsesUuid;
use BenSampo\Enum\Traits\CastsEnums;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * @property mixed from
 * @property mixed to
 * @method static whereDate(string $string, string $string1, string $toDateString)
 */
class OtherLeave extends Model implements Auditable
{
    use CastsEnums, UsesUuid, SoftDeletes, \OwenIt\Auditing\Auditable;

    protected $fillable = ['from', 'to', 'type', 'description', 'loc'];

    protected $enumCasts = [
        'type' => OtherLeaveType::class
    ];

    /**
     * @return BelongsTo
     */
    public function army()
    {
        return $this->belongsTo(Army::class);
    }

    /**
     * @return string
     */
    public function getDaysAttribute()
    {
        return Carbon::parse($this->from)->diffInDays(Carbon::parse($this->to)) . ' days';
    }

    public function getRemainingAttribute()
    {
        return Carbon::today()->diffInDays(Carbon::parse($this->to)) . ' days';
    }

}

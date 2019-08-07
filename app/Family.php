<?php

namespace App;

use App\Enums\BloodGroupType;
use App\Enums\RelationType;
use App\Traits\StoreImage;
use App\Traits\UsesUuid;
use BenSampo\Enum\Traits\CastsEnums;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * @property mixed dob
 */
class Family extends Model implements Auditable
{
    use UsesUuid, CastsEnums, StoreImage, SoftDeletes, \OwenIt\Auditing\Auditable;

    protected $fillable = ['name', 'education', 'occupation', 'blood_group', 'mobile', 'certificate', 'dom', 'pan_card', 'dob', 'relation'];

    protected $enumCasts = [
        'relation' => RelationType::class,
        'blood_group' => BloodGroupType::class,
    ];


    /**
     * @param $image
     */
    public function setCertificateAttribute($image)
    {
        if (is_object($image)) $image = $this->generateFileNameAndStore($image, '', true);
        $this->attributes['certificate'] = $image;
    }

//    /**
//     * @param $value
//     * @return false|string
//     */
//    public function getDobAttribute($value)
//    {
//        return $value ? date('d-m-Y', strtotime($value)) : null;
//    }
//
//
//    /**
//     * @param $value
//     * @return false|string
//     */
//    public function getDomAttribute($value)
//    {
//        return $value ? date('d-m-Y', strtotime($value)) : null;
//    }

    /**
     * @return string|null
     */
    public function getAgeAttribute()
    {
        $year = Carbon::today()->diffInYears(Carbon::parse($this->dob));
        return $this->dob ? $year ? $year . ' Years' : (Carbon::today()->diffInMonths(Carbon::parse($this->dob))) . ' Months' : null;
    }


}

<?php

namespace App;

use App\Enums\BloodGroupType;
use App\Enums\CompanyName;
use App\Enums\MaritalStatusType;
use App\Enums\ReligionType;
use App\Traits\EnumValue;
use App\Traits\StoreImage;
use App\Traits\UsesUuid;
use BenSampo\Enum\Traits\CastsEnums;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use OwenIt\Auditing\Contracts\Auditable;
use Str;

/**
 * @method static create(array $all)
 * @method static findOrFail($id)
 * @method static where(string $string, bool $true)
 * @method static latest()
 * @property mixed doe
 * @property mixed dob
 * @property mixed id
 */
class Army extends Model implements Auditable
{
    use EnumValue, UsesUuid, CastsEnums, StoreImage, \OwenIt\Auditing\Auditable;

    protected $fillable = ['name', 'email', 'mobile', 'dob', 'blood_group', 'religion',
        'caste', 'marital_status', 'mother_tongue', 'medical', 'education', 'nrs',
        'regd_no', 'id_card_no', 'rank', 'doe', 'image', 'company'
    ];

    protected $enumCasts = [
        'marital_status' => MaritalStatusType::class,
        'blood_group' => BloodGroupType::class,
//        'company' => CompanyName::class,
        'religion' => ReligionType::class
    ];


    /**
     * @return HasMany
     */
    public function families()
    {
        return $this->hasMany(Family::class);
    }

    /**
     * @return HasMany
     */
    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    /**
     * @return HasOne
     */
    public function csdCard()
    {
        return $this->hasOne(CSDCard::class);
    }

    /**
     * @return HasMany
     */
    public function insurances()
    {
        return $this->hasMany(Insurance::class);
    }

    /**
     * @return HasOne
     */
    public function account()
    {
        return $this->hasOne(Account::class);
    }

    /**
     * @return HasMany
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    /**
     * @return HasMany
     */
    public function punishments()
    {
        return $this->hasMany(Punishment::class);
    }

    /**
     * @return HasOne
     */
    public function sarpanch()
    {
        return $this->hasOne(Sarpanch::class);
    }

    /**
     * @return HasMany
     */
    public function nok()
    {
        return $this->hasMany(NOKDetails::class);
    }

    /**
     * @return HasMany
     */
    public function awards()
    {
        return $this->hasMany(Award::class);
    }

    /**
     * @return HasMany
     */
    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }

    /**
     * @return HasOne
     */
    public function address()
    {
        return $this->hasOne(Address::class);
    }

    /**
     * @param $value
     * @return false|string
     */
    public function getNameAttribute($value)
    {
        return Str::upper($value);
    }

    /**
     * @param $value
     * @return false|string
     */
    public function getDobAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }

    /**
     * @param $value
     * @return false|string
     */
    public function getDoeAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }

    /**
     * @return false|string
     */
    public function getDosAttribute()
    {
        $months = Carbon::parse($this->doe)->diffInMonths(Carbon::today());
        return $months > 11 ? intval($months / 12) . ' Years ' . (!$months % 12 ?: $months % 12 . ' Months') : $months . ' Months';
    }

    /**
     * @return false|string
     */
    public function getAgeAttribute()
    {
        return (Carbon::parse($this->dob)->diffInYears(Carbon::today())) . ' Years';
    }

    /**
     * @param $image
     * @return string
     */
    public function setImageAttribute($image)
    {
        if (is_object($image)) $image = $this->generateFileNameAndStore($image, '', true);
        return $this->attributes['image'] = $image;
    }

}

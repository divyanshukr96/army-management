<?php

namespace App;

use App\Enums\BloodGroupType;
use App\Enums\MaritalStatusType;
use App\Enums\ReligionType;
use App\Traits\EnumValue;
use App\Traits\UsesUuid;
use BenSampo\Enum\Traits\CastsEnums;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Session\SessionManager;
use Illuminate\Session\Store;

/**
 * @method static create(array $all)
 * @method static find(SessionManager|Store $session)
 */
class PersonalDetail extends Model
{
    use EnumValue, UsesUuid, CastsEnums;

    protected $fillable = ['name', 'email', 'mobile', 'dob', 'blood_group', 'religion',
        'caste', 'marital_status', 'mother_tongue', 'medical', 'education', 'nrs',
        'regd_no', 'id_card_no', 'rank', 'doe', 'image'
    ];

    protected $enumCasts = [
        'marital_status' => MaritalStatusType::class,
        'blood_group' => BloodGroupType::class,
        'religion' => ReligionType::class
    ];

    /**
     * @return HasMany
     */
    public function family()
    {
        return $this->hasMany(Family::class);
    }

    /**
     * @return HasMany
     */
    public function document()
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
    public function insurance()
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
    public function course()
    {
        return $this->hasMany(Course::class);
    }

    /**
     * @return HasMany
     */
    public function punishment()
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
     */
    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = date('Y-m-d', strtotime($value));
        // Date of Birth
    }

    /**
     * @param $value
     * @return false|string
     */
    public function getDobAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
        // Date of Birth
    }

    /**
     * @param $value
     */
    public function setDoeAttribute($value)
    {
        $this->attributes['doe'] = date('Y-m-d', strtotime($value));
        // Date of Enrollment
    }

    /**
     * @param $value
     */
    public function setImageAttribute($value)
    {
//        $this->attributes['doe'] = date('Y-m-d', strtotime($value));
    }

}

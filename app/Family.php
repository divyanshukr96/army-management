<?php

namespace App;

use App\Enums\BloodGroupType;
use App\Traits\UsesUuid;
use BenSampo\Enum\Traits\CastsEnums;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use UsesUuid, CastsEnums;

    protected $fillable = ['name', 'age', 'education', 'occupation', 'blood_group', 'mobile', 'certificate', 'dom', 'pan_card', 'dob', 'relation'];

    protected $enumCasts = [
        'blood_group' => BloodGroupType::class,
    ];


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
     */
    public function setDomAttribute($value)
    {
        $this->attributes['dom'] = date('Y-m-d', strtotime($value));
        // Date of Birth
    }



}

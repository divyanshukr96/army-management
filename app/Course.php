<?php

namespace App;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Course extends Model implements Auditable
{
    use UsesUuid, \OwenIt\Auditing\Auditable;

    protected $fillable = ['name', 'grade', 'date', 'loc'];


    /**
     * @param $value
     */
    public function setDateAttribute($value)
    {
        $this->attributes['date'] = date('Y-m-d', strtotime($value));
        // Date of Birth
    }

    /**
     * @param $value
     * @return false|string
     */
    public function getDateAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
        // Date of Birth
    }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
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

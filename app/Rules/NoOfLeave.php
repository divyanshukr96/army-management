<?php

namespace App\Rules;

use App\Enums\LeaveType;
use App\Leave;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class NoOfLeave implements Rule
{
    private $request;
    private $casualLeave = 15;
//    private $annualLeave = 60;
    private $earnedLeave = 60;
    private $leave;

    /**
     * Create a new rule instance.
     *
     * @param $request
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $army_id = $this->request->army->id;
        $days = (Carbon::parse($this->request->get('from'))->diffInDays(Carbon::parse($this->request->get('to'))));
        $data = Leave::where('army_id', $army_id)
            ->whereYear('created_at', '=', date('Y'))
            ->where('type', $this->request->type)->sum('days');
        switch ($this->request->type) {
            case LeaveType::EL:
                $this->leave = $this->earnedLeave - $data;
                return ($data + $days) <= $this->earnedLeave;
//            case LeaveType::AL:
//                $this->leave = $this->annualLeave - $data;
//                return ($data + $days) <= $this->annualLeave;
            case LeaveType::CL:
                $this->leave = $this->casualLeave - $data;
                return ($data + $days) <= $this->casualLeave;
            default:
                return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        if ($this->leave) return 'This leave is not permitted for more than ' . $this->leave . ' days.';;
        return 'The no. of leave is not available for this.';
    }
}

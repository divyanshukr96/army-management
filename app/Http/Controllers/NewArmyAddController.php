<?php

namespace App\Http\Controllers;

use App\Enums\BloodGroupType;
use App\Enums\DocumentType;
use App\Enums\LeaveType;
use App\Enums\RelationType;
use App\PersonalDetail;
use Illuminate\Http\Request;

class NewArmyAddController extends Controller
{


    public function family(PersonalDetail $army)
    {
        return $this->generatePageView($army, 'family');
    }

    public function familyCreate(PersonalDetail $army)
    {
        return $this->generatePageView($army, 'family-create');
    }

    public function document(PersonalDetail $army)
    {
        return $this->generatePageView($army, 'document');
    }

    public function professional(PersonalDetail $army)
    {
        return $this->generatePageView($army, 'professional');
    }

    public function professionalCourse(PersonalDetail $army)
    {
        return $this->generatePageView($army, 'newcourse');
    }

    public function professionalPunishment(PersonalDetail $army)
    {
        return $this->generatePageView($army, 'newpunishment');
    }

    private function generatePageView($army, $page = '')
    {
        if ($this->notValid($army)) return redirect()->route('army.create');
        $options = [
            'blood_group' => BloodGroupType::toSelectArray(),
            'relation' => RelationType::toSelectArray(),
            'document' => DocumentType::toSelectArray(),
            'leaveType' => LeaveType::toSelectArray(),
        ];
        $army = PersonalDetail::find(session('army'));
        return view('add.' . $page, compact('options', 'army'));
    }

    private function notValid($army)
    {
        return is_object($army) ? $army->id !== session('army') : $army !== session('army');
    }
}

<?php


use App\Enums\BloodGroupType as Blood;
use App\Enums\DocumentType as Document;
use App\Enums\LeaveType as Leave;
use App\Enums\OtherLeaveType as OtherLeave;

return [
    Blood::class => [
        Blood::A => 'A+',
        Blood::A_ => 'A-',
        Blood::B => 'B+',
        Blood::B_ => 'B-',
        Blood::O => 'O+',
        Blood::O_ => 'O-',
        Blood::AB => 'AB+',
        Blood::AB_ => 'AB-'
    ],

    Document::class => [
        Document::Aadhaar => "Aadhaar Card",
        Document::Pan => "Pan Card",
        Document::Driving => "Driving Licence",
        Document::Passport => "Passport",
    ],

    Leave::class => [
//        Leave::AL => 'Annual Leave',
        Leave::EL => 'Earned Leave',
        Leave::CL => 'Casual Leave',
        Leave::SL => 'Sick Leave',
    ],

    OtherLeave::class => [
        OtherLeave::MH => "Military Hospital",
        OtherLeave::T_DUTY => "Temporary Duty",
    ],
];

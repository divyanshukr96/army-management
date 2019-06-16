<?php

namespace App\Http\Controllers;

use App\Address;
use App\Enums\BloodGroupType;
use App\Enums\LeaveType;
use App\Enums\MaritalStatusType;
use App\Enums\ReligionType;
use App\Http\Requests\PersonalDetailValidate;
use App\NOKDetails;
use App\PersonalDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PersonalDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $armies = PersonalDetail::where('registered', true)->paginate(15);
        return view('personal-details.index', compact('armies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $options = [
            'marital_status' => MaritalStatusType::toSelectArray(),
            'blood_group' => BloodGroupType::toSelectArray(),
            'religion' => ReligionType::toSelectArray()
        ];
        return view('personal-details.create', compact('options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PersonalDetailValidate $request
     * @return Response
     */
    public function store(PersonalDetailValidate $request)
    {
        $army = PersonalDetail::create($request->all());
        session(['army' => $army->id]);
        $army->nok()->save(new NOKDetails([
            'name' => $request->input('nok_name'),
            'relation' => $request->input('nok_relation'),
            'mobile' => $request->input('nok_mobile'),
        ]));
        $army->address()->save(new Address($request->all()));
        return redirect()->route('add.family', $army->id);
    }

    /**
     * Display the specified resource.
     *
     * @param PersonalDetail $army
     * @return void
     */
    public function show(PersonalDetail $army)
    {
        $options = [
            'leaveType' => LeaveType::toSelectArray(),
        ];
        if (request()->has('tab') && view()->exists('details.' . request()->get('tab'))) {
            return view('details.' . request()->get('tab'), compact('army', 'options'));
        }
        return view('details.personal', compact('army'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PersonalDetail $personalDetail
     * @return Response
     */
    public function edit(PersonalDetail $personalDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param PersonalDetail $personalDetail
     * @return Response
     */
    public function update(Request $request, PersonalDetail $personalDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PersonalDetail $personalDetail
     * @return Response
     */
    public function destroy(PersonalDetail $personalDetail)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Address;
use App\Army;
use App\Enums\BloodGroupType;
use App\Enums\LeaveType;
use App\Enums\MaritalStatusType;
use App\Enums\ReligionType;
use App\Http\Requests\ArmyStoreValidate;
use App\NOKDetails;
use Illuminate\Http\Response;

class ArmyController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:army-view|army-edit|army-delete|army-add')->only(['index','show']);
        $this->middleware('permission:army-edit')->only(['edit', 'update']);
        $this->middleware('permission:army-add')->only(['create', 'store']);
        $this->middleware('permission:army-delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $keyword = request()->get('query');
        $armies = Army::where('registered', true)->paginate(15);
        if ($keyword) {
            $armies = Army::where(function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%')
                    ->orWhere('email', 'like', '%' . $keyword . '%')
                    ->orWhere('mobile', 'like', '%' . $keyword . '%')
                    ->orWhere('regd_no', 'like', '%' . $keyword . '%')
                    ->orWhere('id_card_no', 'like', '%' . $keyword . '%')
                    ->orWhere('rank', 'like', '%' . $keyword . '%');
            })->where('registered', true)->paginate(15);
        }
        return view('armies.index', compact('armies'));
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
            'religion' => ReligionType::toSelectArray(),
        ];
        return view('armies.create', compact('options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArmyStoreValidate $request
     * @return Response
     */
    public function store(ArmyStoreValidate $request)
    {
        $army = Army::create($request->validated());
        session(['army' => $army->id]);
        $army->nok()->save(new NOKDetails([
            'name' => $request->input('nok_name'),
            'relation' => $request->input('nok_relation'),
            'mobile' => $request->input('nok_mobile'),
        ]));
        $army->address()->save(new Address($request->validated()));
        return redirect()->route('families.index', $army->id);
    }

    /**
     * Display the specified resource.
     *
     * @param Army $army
     * @return Response
     */
    public function show(Army $army)
    {
        $options = [
            'leaveType' => LeaveType::toSelectArray(),
        ];
        if (request()->has('tab') && view()->exists('armies.details.' . request()->get('tab'))) {
            return view('armies.details.' . request()->get('tab'), compact('army', 'options'));
        }
        return view('armies.details.personal', compact('army'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Army $army
     * @return Response
     */
    public function edit(Army $army)
    {
        $options = [
            'marital_status' => MaritalStatusType::toSelectArray(),
            'blood_group' => BloodGroupType::toSelectArray(),
            'religion' => ReligionType::toSelectArray(),
        ];
        return view('armies.edit', compact('army', 'options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ArmyStoreValidate $request
     * @param Army $army
     * @return Response
     */
    public function update(ArmyStoreValidate $request, Army $army)
    {
        $army->fill($request->all());
        $army->save();
        return redirect()->route('armies.show', $army->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Army $army
     * @return Response
     */
    public function destroy(Army $army)
    {
        //
    }
}

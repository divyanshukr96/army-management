<?php

namespace App\Http\Controllers;

use App\Army;
use App\Enums\BloodGroupType;
use App\Enums\DocumentType;
use App\Enums\MaritalStatusType;
use App\Enums\RelationType;
use App\Enums\ReligionType;
use App\Family;
use App\Http\Requests\FamilyStoreValidate;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class FamilyController extends Controller
{

    public function __construct()
    {
        $this->middleware('newArmy')->only(['index']);
        $this->middleware('permission:army-add')->only(['index']);
        $this->middleware('permission:army-add|army-edit')->only(['create', 'store']);
        $this->middleware('permission:army-edit')->only(['edit', 'update']);
        $this->middleware('permission:army-delete')->only('destroy');
    }

    /**
     * @param Army $army
     * @return Factory|View
     */
    public function index(Army $army)
    {
        return view('families.index', compact('army'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Army $army
     * @return Response
     */
    public function create(Army $army)
    {
        $options = [
            'blood_group' => BloodGroupType::toSelectArray(),
            'relation' => RelationType::toSelectArray(),
        ];
        return view('families.create', compact('options', 'army'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FamilyStoreValidate $request
     * @param Army $army
     * @return void
     */
    public function store(FamilyStoreValidate $request, Army $army)
    {
        $data = $request->except(['dom', 'pan_card', 'certificate']);
        if (RelationType::Wife === $request->get('relation')) $data = $request->all();
        if (RelationType::Children === $request->get('relation')) $data = $request->except(['dom', 'pan_card']);
        $army->families()->save(new Family($data));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param Family $family
     * @return Response
     */
    public function show(Army $army, Family $family)
    {
        return view('families.show', compact('army', 'family'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Army $army
     * @param Family $family
     * @return void
     */
    public function edit(Army $army, Family $family)
    {
        return view('families.edit', compact('army', 'family'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FamilyStoreValidate $request
     * @param Army $army
     * @param Family $family
     * @return void
     */
    public function update(FamilyStoreValidate $request, Army $army, Family $family)
    {
        $family->fill($request->all());
        $family->save();
        if (request()->has('redirect')) {
            return redirect(request()->get('redirect'))->with('flash_message', 'Family details successfully updated.');
        }
        return redirect()->back()->with('flash_message', 'Family details successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Army $army
     * @param Family $family
     * @return Response
     * @throws \Exception
     */
    public function destroy(Army $army, Family $family)
    {
        $family->delete();
        return redirect()->route('families.index')
            ->with('flash_message',
                'User successfully deleted.');
    }
}

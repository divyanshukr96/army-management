<?php

namespace App\Http\Controllers;

use App\Army;
use App\Http\Requests\OtherLeaveStoreValidate;
use App\OtherLeave;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class OtherLeaveController extends Controller
{

    public function index()
    {
        $duties = OtherLeave::query();
        $duties->whereDate('to', '>=', Carbon::today()->toDateString());
        if (request()->has('type')) $duties->where('type', request()->get('type'));
        $duties = $duties->paginate(10);
        return view('duties.index', compact('duties'));
    }

    /**
     * @param Army $army
     * @return Factory|View
     */
    public function create(Army $army)
    {
        if ($army->id) return view('duties.create', compact('army'));
        $keyword = request()->get('search');
        $armies = Army::where('created_at', true)->paginate(15);
        if ($keyword) {
            $armies = Army::where(function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%')
                    ->orWhere('email', 'like', '%' . $keyword . '%')
                    ->orWhere('mobile', 'like', '%' . $keyword . '%')
                    ->orWhere('regd_no', 'like', '%' . $keyword . '%')
                    ->orWhere('id_card_no', 'like', '%' . $keyword . '%')
                    ->orWhere('company', 'like', '%' . $keyword . '%')
                    ->orWhere('rank', 'like', '%' . $keyword . '%');
            }, true)->where('registered', true)->paginate(15);
        }

        return view('duties.find_person', compact('armies'));
    }

    /**
     * @param OtherLeaveStoreValidate $request
     * @param Army $army
     * @return RedirectResponse|Redirector
     */
    public function store(OtherLeaveStoreValidate $request, Army $army)
    {
        $army->duties()->save(new OtherLeave($request->validated()));
        if (request()->has('redirect')) {
            return redirect(request()->get('redirect'))->with('flash_message', 'Duties detail successfully added.');
        }
        return redirect()->back()->with('flash_message', 'Duties detail successfully added.');
    }

    /**
     * @param OtherLeave $duty
     * @return Factory|View
     */
    public function show(OtherLeave $duty)
    {
        return view('duties.show', compact('duty'));
    }

    /**
     * @param OtherLeave $duty
     * @return Factory|View
     */
    public function edit(OtherLeave $duty)
    {
        return view('duties.edit', compact('duty'));
    }

    /**
     * @param OtherLeaveStoreValidate $request
     * @param OtherLeave $duty
     * @return Factory|View
     */
    public function update(OtherLeaveStoreValidate $request, OtherLeave $duty)
    {
        $duty->update($request->validated());
        if (request()->has('redirect')) {
            return redirect(request()->get('redirect'))->with('flash_message', 'Duties detail successfully updated.');
        }
        return redirect()->back()->with('flash_message', 'Duties detail successfully updated.');
    }
}

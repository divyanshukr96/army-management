<?php

namespace App\Http\Controllers;

use App\Army;
use App\Course;
use App\Http\Requests\CourseStoreValidate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:army-add|army-edit'])->only(['store', 'edit', 'update']);
        $this->middleware(['permission:army-delete'])->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Army $army
     * @return Response
     */
    public function create(Army $army)
    {
        return view('courses.create', compact('army'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CourseStoreValidate $request
     * @param Army $army
     * @return Response
     */
    public function store(CourseStoreValidate $request, Army $army)
    {
        $army->courses()->save(new Course($request->all()));
        if (request()->has('redirect')) return redirect(request()->redirect);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param Course $course
     * @return Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Course $course
     * @return Response
     */
    public function edit(Army $army, Course $course)
    {
        return view('courses.edit', compact('army', 'course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CourseStoreValidate $request
     * @param Army $army
     * @param Course $course
     * @return Response
     */
    public function update(CourseStoreValidate $request, Army $army, Course $course)
    {
        $course->fill($request->all());
        $course->save();
        if (request()->has('redirect')) {
            return redirect(request()->get('redirect'))->with('flash_message', 'Course detail successfully updated.');
        }
        return redirect()->back()->with('flash_message', 'Course detail successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Army $army
     * @param Course $course
     * @return Response
     * @throws \Exception
     */
    public function destroy(Army $army, Course $course)
    {
        $course->delete();
        return redirect()->back()->with('flash_message', 'Course detail successfully deleted.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\CourseStoreValidate;
use App\PersonalDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CourseController extends Controller
{
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
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CourseStoreValidate $request
     * @return Response
     */
    public function store(CourseStoreValidate $request)
    {
        $army = PersonalDetail::find(session('army'));
        $army->course()->save(new Course($request->all()));
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
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Course $course
     * @return Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Course $course
     * @return Response
     */
    public function destroy(Course $course)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Document;
use App\Http\Requests\DocumentStoreValidate;
use App\PersonalDetail;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DocumentStoreValidate $request
     * @return void
     */
    public function store(DocumentStoreValidate $request)
    {
        $army = PersonalDetail::find(session('army'));
        $army->document()->save(new Document($request->all()));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}

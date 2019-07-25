<?php

namespace App\Http\Controllers;

use App\Army;
use App\Course;
use App\Document;
use App\Http\Requests\DocumentStoreValidate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DocumentController extends Controller
{

    public function __construct()
    {
        $this->middleware('newArmy')->only(['index']);
        $this->middleware('permission:army-add|army-edit')->only(['index', 'store', 'edit', 'update']);
        $this->middleware('permission:army-delete')->only('destroy');
    }


    /**
     * Display a listing of the resource.
     *
     * @param Army $army
     * @return Response
     */
    public function index(Army $army)
    {
        return view('documents.create', compact('army'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Army $army
     * @return Response
     */
    public function create(Army $army)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DocumentStoreValidate $request
     * @param Army $army
     * @return void
     */
    public function store(DocumentStoreValidate $request, Army $army)
    {
        $army->documents()->save(new Document($request->all()));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param Course $course
     * @return Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Course $course
     * @return Response
     */
    public function edit(Document $document)
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
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Army $army
     * @param Document $document
     * @return void
     */
    public function destroy(Army $army, Document $document)
    {
        $document->delete();

        return redirect()->back()
            ->with('flash_message', 'Document successfully deleted.');
    }
}

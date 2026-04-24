<?php

namespace App\Http\Controllers;

use App\Models\candidates;
use App\Models\evaluations;
use Illuminate\Http\Request;

class evaluationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evaluations = Evaluations::all();
        return view('evaluation.index', compact('evaluations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        $candidates = candidates::all();
        return view('evaluation.create', compact('candidates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'candidate_id' => 'required| exists:candidates,id',
            'round_type'   =>  'required',
            'score'        => '  required|numeric|min:1|max:10',
            'feedback'     => 'required'
        ]);
        $candidate = candidates::find($request->candidate_id);
        $evaluations = evaluations::create($request->all());

        return redirect()->route('evaluation.index')->with('success', 'add successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $evaluation = evaluations::find($id);
         return view('evaluation.edit',compact('evaluation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $evaluation = evaluations::find($id);
        $evaluation->update($request->all());
          return redirect()->route('evaluation.index')->with('success', ' updated! successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $evaluation = evaluations::find($id);
        $evaluation->delete();
        return back()->with('success',"Delete Success");
    }
}

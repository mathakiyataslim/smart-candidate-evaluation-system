<?php

namespace App\Http\Controllers;

use App\Models\candidates;
use Illuminate\Http\Request;

class candidatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidates = candidates::all();
        return view('candidate.index',compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('candidate.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:candidates,email',
            'phone'       => 'required|numeric|digits:10', 
            'resume_path' => 'required|mimes:pdf,doc,docx|max:2048', // Max 2MB file
        ]);
        $data = $request->all();
        $file = $request->file('resume_path')->store('/file','public');
        $data['resume_path'] = $file;

        $candidate = candidates::create($data);
          return redirect()->route('candidate.index')->with('success',"Created Successfully");
    
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
        $candidate = candidates::find($id);
        return view('candidate.edit',compact('candidate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $candidates = candidates::find($id);
        $data = $request->all();
        if($request->file('resume_path')){
            $file = $request->file('resume_path')->store('/image', 'public');
            $data['resume_path'] = $file;
        }
        $candidates->update($data);
        return redirect()->route('candidate.index')->with('success',"Update Successfully");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $candidate = candidates::find($id);
        $candidate->delete();
        return back()->with('success','Delete Successfully');
    }
}

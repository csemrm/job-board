<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class MyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view("my_job.index",
        [
            "jobs" => auth()->user()->employer
            ->jobs()
            ->with(['employer','jobApplications','jobApplications.job'])
            ->get()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("my_job.create");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validateData = $request->validate([
            "title" => "required|min:10|string|max:255",
            'location' => "required|string|max:255",
            'salary' => "required|numeric|max:1000000|min:5000",
            'description' => "required|string",
            "experience" => "required|in:" . implode(",", Job::$experience),
            "category" => "required|in:" . implode(",", Job::$category)
        ]);
        auth()->user()->employer->jobs()->create($validateData);
        return redirect()->route("my-jobs.index")->with('success', 'Job created successfully.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Job;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize("viewAny", Job::class);
        //
        $filters = request()->only(['search','min_salary','max_salary','experience','category']);

        $jobs = Job::with('employer')->filter($filters);


        return view("jobs.index",["jobs"=> $jobs->get()]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
        $this->authorize("view", $job);
        return view(
            "jobs.show",
            ["job"=> $job->load("employer.jobs")
        ]);
    }

}

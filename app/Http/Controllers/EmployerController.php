<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;

class EmployerController extends Controller
{
    public function __construct()
    {

        $this->authorizeResource(Employer::class);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view("employer.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //


        $validateData = $request->validate([
            'company_name' => 'required|min:3|unique:employers,company_name',
        ]);

        auth()->user()->employer()->create([
            "company_name" => $validateData['company_name'],
        ]);


        return redirect()->route("jobs.index")->with("success", "Your employer account created successfully..");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employer $employer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employer $employer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employer $employer)
    {
        //
    }
}

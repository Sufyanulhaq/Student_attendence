<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\LeaveRequest;



class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('attendance.leave');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student_id = $request->input('student_id');
        $date = $request->input('date');

        $LeaveRequest = LeaveRequest::where('student_id', $student_id)
        ->where('date', $date)
        ->first();

        if($LeaveRequest){
            return back()->withErrors(['error' => 'Leave already marked for this date.']);
        }

        $LeaveRequest = new LeaveRequest();

        $LeaveRequest->date = now(); // set the date to the current time
        $LeaveRequest->student_id = intval($student_id);
        $LeaveRequest->name = $request->input('name');

        $LeaveRequest->save();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Leave marked successfully.');
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

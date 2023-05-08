<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        return view('attendance.mark');
    }
    public function view()
    {
        return view('attendance.view');
    }

    public function store(Request $request)
    {
        $student_id = $request->input('student_id');
        $date = $request->input('date');
        $attendence = $request->input('attendence');

        $attendance = Attendance::where('student_id', $student_id)
            ->where('date', $date)
            ->first();
        $attendence = Attendance::where('attendence',$attendence);
        if ($attendance) {
            return back()->withErrors(['error' => 'Attendance already marked for this student on this date.']);
        }

        $attendance = new Attendance();

        $attendance->date = $date;
        $attendance->student_id = intval($student_id);
        $attendance->name = $request->input('name');
        $attendance->attendence = $request->input('attendance');

        $attendance->save();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Attendance marked successfully.');
    }



public function show(Request $request)
{
    $request->validate([
        'student_id' => 'required|numeric',
    ]);

    $attendances = Attendance::where('student_id', $request->student_id)->get();

    return view('attendance.show', compact('attendances'));
}



    public function destroy($id)
    {
        //
    }
}

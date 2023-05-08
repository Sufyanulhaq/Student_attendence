<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // StudentController.php

public function update(Request $request, Student $student)
{
    $request->validate([
        'profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('profile_picture')) {
        $imageName = time() . '.' . $request->profile_picture->extension();
        $request->profile_picture->move(public_path('images'), $imageName);
        $student->profile_picture = $imageName;
    }

    $student->save();

    return redirect()->route('students.edit', $student->id)
        ->with('success', 'Profile picture updated successfully.');
}

}

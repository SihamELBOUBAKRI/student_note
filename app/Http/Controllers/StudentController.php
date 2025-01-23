<?php
namespace App\Http\Controllers;

use App\Imports\StudentsImport;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        // Delete all existing student records before importing new ones
        Student::truncate();

        // Import new students from the file
        Excel::import(new StudentsImport, $request->file('file'));

        return redirect()->back()->with('success', 'Students imported successfully!');
    }

    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }
}

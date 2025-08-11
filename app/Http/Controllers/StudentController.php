<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alldata = DB::table('students')->get();
        return view('student.index', [
            "data" => $alldata
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:250",
            "email" => "required|email|max:250",
            "phone" => "required|string|max:20",
            "address" => "required|string|max:250",
            "student_id" => "required|string|max:250",
            "photo" => "nullable|image|mimes:jpg,png,jpeg,webp,gif",

        ]);
        $studentFile = $this->fileUpload($request->file('photo'), "studentPhoto/");

        DB::table('students')->insert([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "address" => $request->address,
            "student_id" => $request->student_id,
            "photo" => $studentFile,
            "created_at" => now()
        ]);
        return redirect()->back()->with('success', 'Student created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('student.show', [
            'data' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('student.edit', [
            "data" => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            "name" => "required|string|max:250",
            "email" => "required|email|max:250",
            "phone" => "required|string|max:20",
            "address" => "required|string|max:250",
            "student_id" => "required|string|max:250",
            "photo" => "nullable|image|mimes:jpg,png,jpeg,webp,gif",

        ]);
        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "address" => $request->address,
            "student_id" => $request->student_id,


        ];

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            if ($student->photo && file_exists(public_path('student/', $student->photo))) {
                unlink(public_path('student/', $student->photo));
            }
            $file_name = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('studentPhoto'), $file_name);

            $data['photo'] = $file_name;
        }

        $student->update($data);
        return redirect()->back()->with('success', 'Student update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        if ($student->photo && file_exists(public_path('student/', $student->photo))) {
            unlink(public_path('student/', $student->photo));
        }
        $student->delete();
        return redirect()->back()->with('success', 'Student delete successfully');
    }
}

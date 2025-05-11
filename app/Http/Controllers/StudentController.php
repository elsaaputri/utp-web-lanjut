<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Student;
use Illuminate\View\View;


class StudentController extends Controller
{
    //

    public function index(): View
    {
        $students = Student::all();
        return view('students.index', compact('students'));


    }


    public function create(): View
    {

        return view('students.create');
    }


    public function store(Request $request): RedirectResponse
{
    // Validasi input
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'addres' => 'required|string|max:255', // Pastikan addres ada
        'mobile' => 'required|string|max:255',
    ]);

    // Membuat data siswa
    Student::create($validated);

    return redirect('student')->with('flash_message', 'Student Added!');
}

    public function show(string $id): View
    {
        $student = Student::find($id);
        return view('students.show')->with('student', $student);
    }
    public function edit(string $id): View
{
    $student = Student::find($id);
    return view('students.edit')->with('students', $student);
}

public function update(Request $request, string $id): RedirectResponse
{
    $student = Student::find($id);
    $input = $request->all();
    $student->update($input);
    return redirect('student')->with('flash_message', 'student Updated!');
}

public function destroy(string $id): RedirectResponse
{
    Student::destroy($id);
    return redirect('student')->with('flash_message', 'Student deleted!');
}


}

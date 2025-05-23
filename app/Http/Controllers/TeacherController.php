<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Teacher;
use Illuminate\View\View;

class TeacherController extends Controller
{
    public function index(): View
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    public function create(): View
    {
        return view('teachers.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Teacher::create($input);
        return redirect('teachers')->with('flash_message', 'Teacher Added!');
    }

    public function show(string $id): View
    {
        $teacher = Teacher::find($id); 
        return view('teachers.show')->with('teacher', $teacher); 
    }

    public function edit(string $id): View
    {
        $teacher = Teacher::find($id); 
        return view('teachers.edit')->with('teacher', $teacher); 
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $teacher = Teacher::find($id); 
        $input = $request->all();
        $teacher->update($input); 
        return redirect('teachers')->with('flash_message', 'Teacher Updated!');
    }

    public function destroy(string $id): RedirectResponse
    {
        Teacher::destroy($id);
        return redirect('teachers')->with('flash_message', 'Teacher deleted!'); // Gantilah 'Teacher' dengan 'teachers'
    }
}

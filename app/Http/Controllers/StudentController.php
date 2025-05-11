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


    public function store(request $request): RedirectResponse
    {
        $input = $request->all(); 
       Student::create($input);
       return redirect('student')->with('flash_message', 'Student Added!');
    }
}

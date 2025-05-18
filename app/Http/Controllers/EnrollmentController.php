<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Enrollment;
use App\Models\Batch;
use App\Models\Student;

class EnrollmentController extends Controller
{
    public function index(): View
    {
        $enrollments = Enrollment::all();
        return view('enrollments.index', compact('enrollments'));
    }

    public function create(): View
    {
        $batches = Batch::pluck('name', 'id');
        $students = Student::pluck('name', 'id');
        return view('enrollments.create', compact('batches', 'students'));
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Enrollment::create($input);
        return redirect('enrollments')->with('flash_message', 'Enrollments Added!');
    }

    public function show(string $id): View
    {
        $course = Enrollment::find($id);
        return view('enrollments.show')->with('enrollments', $course);
    }

    public function edit(string $id): View
    {
        $course = Enrollment::find($id);
        return view('enrollments.edit')->with('enrollments', $course);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $enrollments = Enrollment::find($id);
        $input = $request->all();
        $enrollments->update($input);
        return redirect('enrollments')->with('flash_message', 'Enrollments Updated!');
    }

    public function destroy(string $id): RedirectResponse
    {
        Enrollment::destroy($id);
        return redirect('enrollments')->with('flash_message', 'Enrollments deleted!');
    }
}

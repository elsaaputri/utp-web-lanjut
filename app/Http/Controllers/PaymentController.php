<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Payment;
use App\Models\Enrollment;

use Illuminate\View\View;
class PaymentController extends Controller
{
    public function index(): View
    {
        $payments = Payment::all();
        return view('payments.index', compact('payments'));
    }

    public function create(): View
    {
        $enrollments = Enrollment::pluck('enroll_no','id');
        return view('payments.create', compact('enrollments'));
    }
    

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Payment::create($input);
        return redirect('payments')->with('flash_message', 'Payment Added!');
    }

    public function show(string $id): View
    {
        $payment = Payment::find($id);
        return view('payments.show')->with('payment', $payment);
    }

    public function edit(string $id): View
    {
        $payments = Payment::find($id);
        $enrollments = Enrollment::pluck('enroll_no', 'id');
        return view('payments.edit', compact('payments','enrollments'));

    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $course = Payment::find($id);
        $input = $request->all();
        $course->update($input);
        return redirect('payments')->with('flash_message', 'Payment Updated!');
    }

    public function destroy(string $id): RedirectResponse
    {
        Payment::destroy($id);
        return redirect('payments')->with('flash_message', 'Payment deleted!');
    }
}


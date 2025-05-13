<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
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
        $payments = Payment::pluck('enroll_no','id');
        return view('batches.create', compact('courses'));
    }


    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Payment::create($input);
        return redirect('payments')->with('flash_message', 'Payment Added!');
    }

    public function show(string $id): View
    {
        $payments = Course::find($id);
        return view('payments.show')->with('payments', $payments);
    }

    public function edit(string $id): View
    {
        $payments = Payment::find($id);
        return view('payments.edit')->with('payments', $payments);
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


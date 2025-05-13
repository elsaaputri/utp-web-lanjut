@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">Payments</div>
<div class="card-body">


    <form action="{{ url('batches') }}" method="post">
        {!! csrf_field() !!}
        <label>Enrollment no</label><br>

        <select name="enrollment_id" id="enrollment_id" class="form-control">
            @foreach($payments as $id => $enrollno)
                <option value="{{ $id }}">{{ $enrollno }}</option>
            @endforeach
        </select>
    </form>
    <label>Paid Date:</label><br>
    <input type="text" name="paid_date" id="paid_date" class="form-control"><br>
    <label>Amount:</label><br>
    <input type="text" name="amount" id="amount" class="form-control"><br>
    <input type="submit" value="save" class="btn btn.success">

    </div>
</div>
@stop

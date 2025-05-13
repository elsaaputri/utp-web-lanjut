@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h2>Payments</h2>
                </div>
                <div class="card-body">
                    <a href="{{ url('/payments/create') }}" class="btn btn-success btn-sm" title="Add New Course">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Enrollment No</th>
                                    <th>Paid Date</th>
                                    <th>Amount</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
    @foreach($payments as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->enrollment->enroll_no}}</td>
            <td>{{ $item->paid_date }}</td> 
            <td>{{ $item->amount }}</td> 
            <td>
                <a href="{{ url('/payments/' . $item->id) }}" title="View Payment">
                    <button class="btn btn-info btn-sm">View</button>
                </a>
                <a href="{{ url('/payments/' . $item->id . '/edit') }}" title="Edit Payment">
                    <button class="btn btn-primary btn-sm">Edit</button>
                </a>
                <form method="POST" action="{{ url('/payments/' . $item->id) }}" accept-charset="UTF-8" style="display:inline" onsubmit="return confirm('Confirm delete?')">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Payment">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

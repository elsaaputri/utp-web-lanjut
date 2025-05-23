@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h2>Course Application</h2>
                </div>
                <div class="card-body">
                    <a href="{{ url('/student/create') }}" class="btn btn-success btn-sm" title="Add New Student">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Mobile</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->mobile }}</td>
                                    <td>
                                        <a href="{{ url('/student/' . $item->id) }}" title="View Student">
                                            <button class="btn btn-info btn-sm">View</button>
                                        </a>
                                        <a href="{{ url('/student/' . $item->id . '/edit') }}" title="Edit Student">
                                            <button class="btn btn-primary btn-sm">Edit</button>
                                        </a>
                                        
                                        <form method="POST" action="{{ url('/student/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm('Confirm delete?')">Delete</button>
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

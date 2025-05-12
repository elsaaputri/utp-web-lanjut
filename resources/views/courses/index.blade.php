@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h2>Courses Application</h2>
                </div>
                <div class="card-body">
                    <a href="{{ url('/courses/create') }}" class="btn btn-success btn-sm" title="Add New Course">
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
                                    <th>Syllabus</th>
                                    <th>Duration</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($courses as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->syllabus }}</td>
                                        <td>{{ $item->duration }}</td>
                                        <td>
                                            <a href="{{ url('/courses/' . $item->id) }}" title="View Course">
                                                <button class="btn btn-info btn-sm">View</button>
                                            </a>
                                            <a href="{{ url('/courses/' . $item->id . '/edit') }}" title="Edit Course">
                                                <button class="btn btn-primary btn-sm">Edit</button>
                                            </a>
                                            <form method="POST" action="{{ url('/courses/' . $item->id) }}" accept-charset="UTF-8" style="display:inline" onsubmit="return confirm('Confirm delete?')">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Course">
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

@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">Students Page</div>
    <div class="card-body">

        <form action="{{ url('student') }}" method="post">
            {!! csrf_field() !!}
            <label>Name</label><br>
            <input type="text" name="name" id="name" class="form-control"><br>
            <label>Address</label><br>
            <input type="text" name="address" id="address" class="form-control"><br>
            <label>Mobile</label><br>
            <input type="text" name="mobile" id="mobile" class="form-control"><br>
            <input type="submit" value="Save" class="btn btn-success"><br>
        </form>

    </div>
</div>
@stop




@extends('layout')

@section('content')

<div class="card">
    <div class="card-header">Edit Page</div>
    <div class="card-body">

    <form action="{{ url('courses/' . $course->id) }}" method="post">
{!! csrf_field() !!}
@method("PATCH")

<input type="hidden" name="id" id="id" value="{{ $course->id }}" />

<label>Name:</label><br>
<input type="text" name="name" id="name" value="{{ $course->name }}" class="form-control"><br>

<label>Address:</label><br>
<input type="text" name="address" id="syllabus" value="{{ $course->syllabus }}" class="form-control"><br>

<label>Mobile:</label><br>
<input type="text" name="duration" id="duration" value="{{ $course->duration }}" class="form-control"><br>

<input type="submit" value="Update" class="btn btn-success"><br>
</form>

</div>
</div>
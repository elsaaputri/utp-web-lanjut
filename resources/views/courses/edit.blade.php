@extends('layout')

@section('content')

<div class="card">
    <div class="card-header">Edit Course</div>
    <div class="card-body">

    <form action="{{ url('courses/' . $course->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")

        <input type="hidden" name="id" id="id" value="{{ $course->id }}" />

        <label>Name:</label><br>
        <input type="text" name="name" id="name" value="{{ $course->name }}" class="form-control"><br>

        <label>Syllabus:</label><br>
        <input type="text" name="syllabus" id="syllabus" value="{{ $course->syllabus }}" class="form-control"><br>

        <label>Duration:</label><br>
        <input type="text" name="duration" id="duration" value="{{ $course->duration }}" class="form-control"><br>

        <input type="submit" value="Update" class="btn btn-success"><br>
    </form>

    </div>
</div>

@stop

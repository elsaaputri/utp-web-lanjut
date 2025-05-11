@extends('layout')

@section('content')

<div class="card">
    <div class="card-header">Contactus Page</div>
    <div class="card-body">




<form action="{{ url('student', $students->id) }}" method="post">
    {!! csrf_field() !!}
    @method("PATCH")
    
    <input type="hidden" name="id" id="id" value="{{ $students->id }}" />
    
    <label>Name:</label><br>
    <input type="text" name="name" id="name" value="{{ $students->name }}" class="form-control"><br>
    
    <label>Address:</label><br>
    <input type="text" name="addres" id="addres" value="{{ $students->address }}" class="form-control"><br>
    
    <label>Mobile:</label><br>
    <input type="text" name="mobile" id="mobile" value="{{ $students->mobile }}" class="form-control"><br>
    
    <input type="submit" value="Update" class="btn btn-success"><br>
</form>

@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="text-center">
      <div class="col-md-12">
        <h2>Student Details</h2>
        <hr>
        <a href="{{route('student.index')}}" class="btn btn-md btn-primary">Go Back</a>
        <hr width="75%">
        <br>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <strong>First Name : &emsp;</strong> {{$student->first_name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Last Name : &emsp;</strong> {{$student->last_name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Email : &emsp;</strong> {{$student->email}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Phone : &emsp;</strong> {{$student->phone}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Address : &emsp;</strong> {{$student->address}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Selected Course/s : &emsp;</strong>
             @foreach($student->courses as $course) 
                {{$course->course_name}}
                
              @endforeach
        </div>
      </div>
      <div class="col-md-12">
        <form action="{{ route('student.destroy', $student->id) }}" method="post">
          <a class="btn btn-md btn-warning" href="{{route('student.edit',$student->id)}}">Edit</a>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-md btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
        </form>
      </div>
    </div>   
  </div>
@endsection
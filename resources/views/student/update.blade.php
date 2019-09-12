@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="text-center">
      <div class="col-lg-12">
        <h1>Edit Student Details</h1>
        <hr>
        <a href="{{route('student.index')}}" class="btn btn-md btn-danger">Go Back</a>
        <hr width="75%">
        <br>
      </div>
    </div>

      @if ($errors->any())
        <div class="alert alert-danger">
          <label>Whoops! </label> there where some problems with your input.<br>
          <ul>
            @foreach ($errors as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{route('student.update',$student->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-8">
            <div class="form-group">
              <label>First Name</label>
              <input type="text" name="first_name" class="form-control" value="{{$student->first_name}}">
            </div>
            <div  class="form-group">
              <label>Last Name</label>
              <input type="text" name="last_name" class="form-control" value="{{$student->last_name}}">
            </div>
            <div  class="form-group">
              <label>Email</label>
              <input type="text" name="email" class="form-control" value="{{$student->email}}">
            </div>
            <div  class="form-group">
              <label>Phone</label>
              <input type="text" name="phone" class="form-control" value="{{$student->phone}}">
            </div>
            <div  class="form-group">
              <label>Address</label>
              <textarea class="form-control" name="address">{{$student->address}}</textarea>
            </div>
            <div  class="form-group">
              <div>
                <label for="course">Courses available</label>         
                <div>
                  @foreach($courses as $course)                       
                
                    <input type="checkbox" name="course_name[]" value="{{$course->id}}"
                    @if($student->courses->contains($course->id)) checked="checked" 
                    @endif> {{$course->course_name}}
                  <br>
                  @endforeach 
                </div>
              </div>
            </div>
            <div>
              <button type="submit" class="btn btn-md btn-primary">Update Details</button>
            </div>
          </div>
        </div>
      </form>
    </div>
@endsection
@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="text-center">
       <div class="col-lg-12">
          <h1>Add New Student</h1>
          <hr width="75%"><br>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! </strong> there where some problems with your input.<br>
        <ul>
          @foreach ($errors as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{route('student.store')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-8">
          <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" required>
          </div>
          <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="Email" required>
          </div>
          <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="number" name="phone" id="phone" class="form-control" placeholder="Phone Number" required>
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" id="address" class="form-control" placeholder="Address"></textarea>
          </div>
          <div class="form-group">
            <div >
              <label for="course">Courses available</label>         
              <div>
                <input type="checkbox" name="course_name[]" value="1">&emsp;Java 
              </div>
              <div>
                <input type="checkbox" name="course_name[]" value="2">&emsp;Python
              </div>
              <div>
                <input type="checkbox" name="course_name[]" value="3">&emsp;Android
              </div>
              <div>
                <input type="checkbox" name="course_name[]" value="4">&emsp;Microsft Excel
              </div>
            </div>
          </div>
          <div>
            <button type="submit" class="btn btn-md btn-primary">Add Student</button>
            <a href="{{route('student.index')}}" class="btn btn-md btn-danger">Cancel</a>        
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection
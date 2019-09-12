@extends('layouts.app')
@section('content')

  <div class="container">
    <center>
    <div>
      <h1>Student Management System</h1>
      <hr> <br>
    </div>
    <div>
      <a class="btn btn-md btn-primary" href="{{ route('student.create') }}">Add New Student</a><hr width="75%"><br>
    </div>
    </center>
    <br>

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif

    <table class="table table-hover table-sm">
      <tr class="bg-dark text-white text-center">
        <th width = "100px">Serial No.</th>
        <th width = "200px">First Name</th>
        <th width = "200px">Last Name</th>
        <th width = "200px">Email</th>
        <th width = "200px">Phone</th>
        <th width = "250px">Action</th>
      </tr>

      @foreach ($students as $student)
        <tr class="text-center">
          <td><b>{{$i++}}.</b></td>
          <td>{{$student->first_name}}</td>
          <td>{{$student->last_name}}</td>
          <td>{{$student->email}}</td>
          <td>{{$student->phone}}</td>
          <td>
            <form action="{{ route('student.destroy', $student->id) }}" method="post">
              <a class="btn btn-md btn-info" href="{{route('student.show',$student->id)}}">View</a>
              <a class="btn btn-md btn-warning" href="{{route('student.edit',$student->id)}}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-md btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>
    {!! $students->links() !!}
  </div>
@endsection
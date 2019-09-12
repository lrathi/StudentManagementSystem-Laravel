<?php

namespace App\Http\Controllers;

use App\Student;
use App\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::paginate(20);
        return view ('student.index', compact('students'))
                    ->with('i', (request()->input('page',1)));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('student.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => ['required','min:10','max:10'],
            'address' => 'required',
            'course_name' => 'required'
        ]);

        $course_ids = $request -> get('course_name');
        $student = new Student();
        $student -> first_name = $request -> get('first_name');
        $student -> last_name = $request -> get('last_name');
        $student -> email = $request -> get('email');
        $student -> phone = $request -> get('phone');
        $student -> address = $request -> get('address');

        $student -> save();

        $student->courses() -> attach($course_ids);

        return redirect() -> route('student.index')
                            -> with('success','New student added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::with('courses') -> find($id);
        return view('student.view', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courses =  Course::all();
        $student = Student::with('courses') -> find($id);
        return view('student.update', compact('student','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'course_name' => 'required'
        ]);

        $student = Student::find($id);
        $course = new Course();
        $course_ids = $request -> get('course_name');
        $student -> first_name = $request -> get('first_name');
        $student -> last_name = $request -> get('last_name');
        $student -> email = $request -> get('email');
        $student -> phone = $request -> get('phone');
        $student -> address = $request -> get('address');
        $student -> courses() -> sync($course_ids);

        $student -> save();

        return redirect() -> route('student.index')
                            -> with('success','Student updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student -> courses() -> detach();

        $student -> delete();

        return redirect() -> route('student.index')
                            -> with('success','Student deleted successfully');
    }
}

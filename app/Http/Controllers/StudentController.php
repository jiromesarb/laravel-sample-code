<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\Student;
use App\Subject;
use App\StudentSubjects;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return $request->all();

        $students = Student::with('getSubjects')->orderBy('id', 'desc');

        // Filter the students base on the filtered of the user
        if(!empty($request->keyword) || !empty($request->subjects)){

            $students = $students->filter($request->all());
        }

        $students = $students->paginate(10);

        $subjects = Subject::orderBy('name', 'asc')->get();

        return view('pages.students.index', compact('students', 'subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::orderBy('name', 'asc')->get();

        return view('pages.students.create', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'name' => 'required',
			'contact_number' => 'required',
		]);
		if ($v->fails()) return back()->withInput()->withErrors($v->errors());

        $student_id = Student::insertGetId($request->except(['_token', 'subjects']));
        if ($student_id) {

            // Check if request subjects is empty
            if(!empty($request->subjects)){

                // Get request subjects
                // Reduces the proccess time if you do this. done inserting the data directly to the foreach.
                $student_subject_data = [];
                foreach($request->subjects as $subject){
                    $subject_data[] = [
                        'student_id' => $student_id,
                        'subject_id' => $subject,
                    ];
                }

                // insert relationship data.
                StudentSubjects::insert($subject_data);
            }

            return back()->with([
                'notif.style' => 'success',
                'notif.icon' => 'plus-circle',
                'notif.message' => 'Insert successful!',
            ]);
        }
        else {
            return back()->withInput()->with([
                'notif.style' => 'danger',
                'notif.icon' => 'times-circle',
                'notif.message' => 'Failed to Insert',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::with(['getSubjects.subject'])->where('id', $id)->first();

        return view('pages.students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::with(['getSubjects.subject'])->where('id', $id)->first();
        $subjects = Subject::orderBy('name', 'asc')->get();

        return view('pages.students.edit', compact('student', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {

        // return $request->all();
        $v = Validator::make($request->all(), [
            'name' => 'required',
			'contact_number' => 'required',
		]);
		if ($v->fails()) return back()->withInput()->withErrors($v->errors());


        if ($student->update($request->except(['_token', '_method', 'subjects']))) {

            // Check if request subjects is empty
            if(!empty($request->subjects)){
                // Delete Previous subjects of student
                StudentSubjects::whereIn('subject_id', $request->subjects)->delete();

                // Get request subjects
                // Reduces the proccess time if you do this. done inserting the data directly to the foreach.
                $student_subject_data = [];
                foreach($request->subjects as $subject){
                    $subject_data[] = [
                        'student_id' => $student['id'],
                        'subject_id' => $subject,
                    ];
                }

                // insert relationship data.
                StudentSubjects::insert($subject_data);
            } else {
                StudentSubjects::where('student_id', $student['id'])->delete();
            }

            return back()->withInput()->with([
                'notif.style' => 'success',
                'notif.icon' => 'plus-circle',
                'notif.message' => 'Updated successful!',
            ]);
        }
        else {
            return back()->withInput()->with([
                'notif.style' => 'danger',
                'notif.icon' => 'times-circle',
                'notif.message' => 'Failed to update',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        if ($student->delete(0)) {
            return back()->withInput()->with([
                'notif.style' => 'success',
                'notif.icon' => 'plus-circle',
                'notif.message' => 'Deleted successful!',
            ]);
        }
        else {
            return back()->withInput()->with([
                'notif.style' => 'danger',
                'notif.icon' => 'times-circle',
                'notif.message' => 'Failed to Delete',
            ]);
        }
    }
}

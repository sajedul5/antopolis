<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;

class StudentController extends Controller
{
    public function viewStudent()
    {
        $data = Student::all();
        return $data;
    }


    public function showCourse()
    {
        $data = Course::all();
        return $data;
    }



    public function addStudent(Request $request)
    {
        $data = new Student;
        $data->name = $request->name;
        $data->course_id = $request->course_id;
        $result = $data->save();

        if($result){
            return ['result' => 'Student Added!'];
        }else{
            return ['result' => 'Student not Added!'];
        }
    }


    public function updateStudent(Request $request, $id)
    {
        $data = Student::find($id);
        $data->name = $request->name;
        $data->course_id = $request->course_id;
        $result = $data->save();

        if($result){
            return ['result' => 'Student updated!'];
        }else{
            return ['result' => 'Student not updated!'];
        }
    }
}

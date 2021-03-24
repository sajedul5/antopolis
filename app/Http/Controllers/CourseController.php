<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function view()
    {
        $data = Course::all();
        return $data;
    }



    public function add(Request $request)
    {
        $data = new Course;
        $data->name = $request->name;
        $result = $data->save();

        if($result){
            return ['result' => 'Course Added!'];
        }else{
            return ['result' => 'Course not Added!'];
        }
    }


    public function destroy($id)
    {
        $data = Course::find($id);
        $result = $data->delete();

        if($result){
            return 'Data delete!';
        }else{
            return 'Data Not deleted!';
        }
    }
}

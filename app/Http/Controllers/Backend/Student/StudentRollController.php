<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Model\AssignStudent;
use App\Model\StudentClass;
use App\Model\Year;
use Illuminate\Http\Request;

class StudentRollController extends Controller
{
    public function view(){

        $data['years']= Year::orderBy('name','desc')->get();
        $data['classes']= StudentClass::all();
        $data['year_id']= Year::orderBy('name','desc')->first()->id;
        $data['class_id']= StudentClass::orderBy('id','asc')->first()->id;
        $data['allData'] = AssignStudent::where('year_id',$data['year_id'])->where('class_id',$data['class_id'])->get();
        return view('backend.student.roll_generate.view-roll-generate',$data);
    }

    public function getStudent(Request $request){
      $allData = AssignStudent::with(['student'])->where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
      return response()->json($allData);
    }

    public function store(Request $request){
        $year_id = $request->year_id;
        $class_id = $request->class_id;

        if ($request->student_id !=null){
            for ($i=0; $i< count($request->student_id); $i++){
                AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->where('student_id',$request->student_id[$i])->update(['roll' => $request->roll[$i]]);
            }
        }else{
            return redirect()->back()->with('error','Sorry! there are no student');
        }
        return redirect()->route('students.Roll.view')->with('success','well done! successfully roll generated');
    }
}

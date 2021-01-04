<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Model\Subject;
use App\Model\AssignSubject;
use App\Model\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignSubjectController extends Controller
{
    public function view(){

        $data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();

        return view('backend.setup.assign_subject.view-assign-subject',$data);
    }


    public function add(){

        $data['subjects'] = Subject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.add-assign-subject',$data);
    }

    public function store(Request $request){
        $subjectCount = count($request->subject_id);
        if ($subjectCount !=NULL)
        {
            for ($i=0; $i <$subjectCount ; $i++){
                $assign_sub = new AssignSubject();
                $assign_sub->class_id = $request->class_id;
                $assign_sub->subject_id = $request->subject_id[$i];
                $assign_sub->full_mark = $request->full_mark[$i];
                $assign_sub->pass_mark = $request->pass_mark[$i];
                $assign_sub->subjective_mark = $request->subjective_mark[$i];
                $assign_sub->created_by = Auth::user()->id;
                $assign_sub->save();
            }
        }
        return redirect()->route('setup.assign.subject.view')->with('success','Data inserted successfully');
    }


    public function edit($class_id)
    {


        $data['editData'] = AssignSubject::where('class_id',$class_id)->get();

        $data['subjects'] = Subject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.edit-assign-subject',$data);
    }



    public function update(Request $request, $class_id){
        if ($request->subject_id==NULL){
            return redirect()->back()->with('error','sorry you do not select any item');
        }else{
            AssignSubject::whereNotIn('subject_id',$request->subject_id)->where('class_id',$request->class_id)->delete();
            foreach ($request->subject_id as $key => $value) {
                $assign_subject_exist = AssignSubject::where('subject_id',$request->subject_id[$key])->where('class_id',$request->class_id)->first();
                if ($assign_subject_exist){
                    $assignSubjects = $assign_subject_exist;
                }else{
                    $assignSubjects = new AssignSubject();
                }
                $assignSubjects->class_id = $request->class_id;
                $assignSubjects->subject_id = $request->subject_id[$key];
                $assignSubjects->full_mark = $request->full_mark[$key];
                $assignSubjects->pass_mark = $request->pass_mark[$key];
                $assignSubjects->subjective_mark = $request->subjective_mark[$key];
                $assignSubjects->updated_by = Auth::user()->id;
                $assignSubjects->save();

            }



        }

        return redirect()->route('setup.assign.subject.view')->with('success','Data Updated successfully');
    }

    public function details($class_id){
        $data['editData'] = AssignSubject::where('class_id',$class_id)->get();

        return view('backend.setup.assign_subject.details-assign-subject',$data);
    }
    public function delete($id){
        $student = StudentGroup::find($id);

        $student->delete();
        return redirect()->route('setups.student.group.view')->with('success','data deleted successfully');
    }
}

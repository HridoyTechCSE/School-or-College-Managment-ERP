<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentGroup;

class GroupController extends Controller
{
    public function view(){


        $data['allData'] = StudentGroup::all();

        return view('backend.setup.group.view-group',$data);
    }


    public function add(){

        return view('backend.setup.group.add-group');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' =>'required|unique:student_groups,name'
        ]);
        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('setups.student.group.view')->with('success','Data inserted successfully');
    }


    public function edit($id)
    {

        $editData = StudentGroup::find($id);
        return view('backend.setup.group.add-group',compact('editData'));
    }



    public function update(Request $request, $id){
        $data = StudentGroup::find($id);
        $this->validate($request,[
            'name' =>'required|unique:student_groups,name,'.$data->id
        ]);

        $data->name = $request->name;
        $data->save();
        return redirect()->route('setups.student.group.view')->with('success','Data Updated successfully');
    }
    public function delete($id){
        $student = StudentGroup::find($id);

        $student->delete();
        return redirect()->route('setups.student.group.view')->with('success','data deleted successfully');
    }
}

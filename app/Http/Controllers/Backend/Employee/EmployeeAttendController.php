<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Designation;
use App\Model\LeavePurpose;
use App\Model\EmployeeLeave;
use App\Model\EmployeeAttedence;
use App\Model\Employee\EmployeeSalaryLog;
use App\User;
use DB;
use PDF;
class EmployeeAttendController extends Controller
{
    public function view(){

        $data['allData'] = EmployeeAttedence::select('date')->groupBy('date')->orderBy('id','desc')->get();
        return view('backend.employee.employee_attend.attendance-view',$data);
    }



    public function add(){

        $data['employees']= User::where('usertype','employee')->get();
        $data['leave_purpose']= LeavePurpose::all();
        return view('backend.employee.employee_attend.add-attendance',$data);
    }

    public function store(Request $request){

        EmployeeAttedence::where('date',date('Y-m-d',strtotime($request->date)))->delete();
        $countemployee = count($request->employee_id);
        for ($i=0; $i < $countemployee; $i++) {
            $attend_status = 'attend_status'.$i;
            $attend = new EmployeeAttedence();
            $attend->date = date('Y-m-d',strtotime($request->date));
            $attend->employee_id = $request->employee_id[$i];
            $attend->attend_status = $request->$attend_status;
            $attend->save();
        }

        return redirect()->route('employees.attend.view')->with('success',' data inserted successfully');
    }


    public function edit($date)
    {

        $data['editData'] = EmployeeAttedence::where('date',$date)->get();

        $data['employees'] = User::where('usertype','employee')->get();

        return view('backend.employee.employee_attend.add-attendance',$data);
    }



    public function update(Request $request, $id){
        DB::transaction(function () use($request, $id){


            if ($request->leave_purpose_id == "0"){
                $leavepurpose = new LeavePurpose();
                $leavepurpose->name = $request->name;
                $leavepurpose->save();
                $leave_purpose_id = $leavepurpose->id;
            }else{
                $leave_purpose_id = $request->leave_purpose_id;
            }
            $employee_leave = EmployeeLeave::find($id);
            $employee_leave->employee_id = $request->employee_id;
            $employee_leave->start_date = date('Y-m-d',strtotime($request->start_date));
            $employee_leave->end_date = date('Y-m-d',strtotime($request->end_date));
            $employee_leave->leave_purpose_id = $leave_purpose_id;
            $employee_leave->save();


        });

        return redirect()->route('employees.leave.view')->with('success','data updated successfully');
    }



    public function details($date){
        $data['details'] = EmployeeAttedence::where('date',$date)->get();

        return view('backend.employee.employee_attend.details-attendance',$data);
    }
}

<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use App\Model\AccountEmployeeSalary;
use App\Model\AccountOtherCost;
use App\Model\AccountStudentFee;
use App\Model\EmployeeAttedence;
use App\Model\ExamType;
use App\Model\MarksGrade;
use App\Model\StudentClass;
use App\Model\StudentMarks;
use App\Model\Year;
use App\User;
use Illuminate\Http\Request;
use PDF;
class ProfitController extends Controller
{
    public function view(){
        return view('backend.reports.profit-view');
    }

    public function profit(Request $request)
    {

        $start_date = date('Y-m',strtotime($request->start_date));
        $end_date = date('Y-m',strtotime($request->end_date));
        $sdate = date('Y-m-d',strtotime($request->start_date));
        $edate = date('Y-m-d',strtotime($request->end_date));
        $student_fee = AccountStudentFee::whereBetween('date',[$start_date, $end_date])->sum('amount');
        $other_cost = AccountOtherCost::whereBetween('date',[$sdate, $edate])->sum('amount');
        $emp_salary = AccountEmployeeSalary::whereBetween('date',[$start_date, $end_date])->sum('amount');
        $total_cost = $other_cost+$emp_salary;
        $profit = $student_fee-$total_cost;

        $html['thsource'] = '<th>Students Fee</th>';
        $html['thsource'] .= '<th>Other Cost</th>';
        $html['thsource'] .= '<th>Employee Salary</th>';
        $html['thsource'] .= '<th>Total Cost</th>';
        $html['thsource'] .= '<th>Profit</th>';
        $html['thsource'] .= '<th>Action</th>';
        $color = 'success';
        $html['tdsource']  ='<td>'.$student_fee.'</td>';
        $html['tdsource'] .='<td>'.$other_cost.'</td>';
        $html['tdsource'] .='<td>'.$emp_salary.'</td>';
        $html['tdsource'] .='<td>'.$total_cost.'</td>';
        $html['tdsource'] .='<td>'.$profit.'</td>';
        $html['tdsource'] .='<td>';
        $html['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" target="_blank" href="'.route("reports.profit.pdf").'?start_date='.$sdate.'&end_date='.$edate.'"><i class="fa fa-file"></i> </a>';
        $html['tdsource'] .='</td>';
        return response()->json(@$html);
    }

    public function pdf(Request $request)
    {
        $data['sdate'] = date('Y-m',strtotime($request->start_date));
        $data['edate'] = date('Y-m',strtotime($request->end_date));
        $data['start_date'] = date('Y-m-d',strtotime($request->start_date));
        $data['end_date'] = date('Y-m-d',strtotime($request->end_date));

        $pdf = Pdf::loadView('backend.reports.pdf.monthly-profit-pdf',$data);

        return $pdf->stream('document.pdf');

    }

    public function marksheetview()
    {
        $data['years'] = Year::orderBy('id','DESC')->get();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();
        return view('backend.reports.marksheet-view',$data);
    }

    public function markSheetGet(Request $request){
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $exam_type_id = $request->exam_type_id;
        $id_no = $request->id_no;
        $count_fail = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('in_no',$id_no)
            ->where('marks','<','33')->get()->count();
        $singleStudent = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('in_no',$id_no)->first();

        if ($singleStudent == true){
            $allmarks = StudentMarks::with(['assign_subject','year'])->where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',
            $exam_type_id)->where('in_no',$id_no)->get();
            $allGreads = MarksGrade::all();
            return view('backend.reports.pdf.marksheet-pdf', compact('allmarks','allGreads','count_fail'));
        }else{
            return redirect()->back()->with('error','Sorry! These criteria does not match!');
        }
    }

    public function attendanceview()
    {
        $data['employees'] = User::where('usertype','employee')->get();
        return view('backend.reports.attendance-view',$data);
    }

    public function attendanceGet(Request $request)
    {

        $employee_id = $request->employee_id;
        if ($employee_id !=''){
            $where[] = ['employee_id',$employee_id];
        }
        $date = date('Y-m', strtotime($request->date));
        if ($date !=''){
            $where[] = ['date','like',$date.'%'];
        }
        $singleAttendance = EmployeeAttedence::with(['user'])->where($where)->first();
        if ($singleAttendance == true){
            $data['allData'] = EmployeeAttedence::with(['user'])->where($where)->get();
            $data['absent'] = EmployeeAttedence::with(['user'])->where($where)->where('attend_status','Absent')->get()->count();
            $data['leaves'] = EmployeeAttedence::with(['user'])->where($where)->where('attend_status','Leave')->get()->count();
            $data['month'] = date('M Y', strtotime($request->date));
            $pdf = PDF::loadView('backend.reports.pdf.attendance-pdf',$data);

            return $pdf->stream('document.pdf');

        }
        else{
            return redirect()->back()->with('error','Sorry! These criteria does not match!');
        }
    }



    public function resultview()
    {
        $data['years'] = Year::orderBy('id','DESC')->get();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();
        return view('backend.reports.result-view',$data);
    }

    public function resultGet(Request $request){
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $exam_type_id = $request->exam_type_id;

        $singleResult = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->first();

        if ($singleResult == true){
            $data['allData'] = StudentMarks::select('year_id','class_id','exam_type_id','student_id')->where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',
                $exam_type_id)->groupBy('year_id')->groupBy('class_id')->groupBy('exam_type_id')->groupBy('student_id')->get();
            $pdf = PDF::loadView('backend.reports.pdf.result-pdf',$data);
            $pdf->SetProtection(['copy','print'], '', 'pass');
            return $pdf->stream('document.pdf');
        }else{
            return redirect()->back()->with('error','Sorry! These criteria does not match!');
        }
    }
}

<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Model\AssignStudent;
use App\Model\FeeCategoryAmount;
use App\Model\StudentClass;
use App\Model\Year;
use Illuminate\Http\Request;
use PDF;
class RegistationFeeController extends Controller
{
    public function view(){

        $data['years']= Year::orderBy('name','desc')->get();
        $data['classes']= StudentClass::all();
        return view('backend.student.registration_fee.view-registration-fee',$data);
    }

    public function getStudent(Request $request){
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        if ($year_id != ''){
            $where[] = ['year_id','like',$year_id.'%'];
        }
        if ($class_id != ''){
            $where[] = ['class_id','like',$class_id.'%'];
        }
        $allStudent = AssignStudent::with(['discount'])->where($where)->get();

        $html['thsource'] = '<th>SL</th>';
        $html['thsource'] .= '<th>ID No</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Roll No</th>';
        $html['thsource'] .= '<th>Registration Fee</th>';
        $html['thsource'] .= '<th>Discount Amount</th>';
        $html['thsource'] .= '<th>Fee (This student)</th>';
        $html['thsource'] .= '<th>Action</th>';

        foreach ($allStudent as $key => $v){
            $registrationfee = FeeCategoryAmount::where('fee_category_id','3')->where('class_id',$v->class_id)->first();
            $color = 'success';
            $html[$key]['tdsource'] ='<td>'.($key+1).'</td>>';
            $html[$key]['tdsource'] .='<td>'.$v['student']['id_no'].'</td>>';
            $html[$key]['tdsource'] .='<td>'.$v['student']['name'].'</td>>';
            $html[$key]['tdsource'] .='<td>'.$v->roll.'</td>>';
            $html[$key]['tdsource'] .='<td>'.$registrationfee->amount.'</td>>';
            $html[$key]['tdsource'] .='<td>'.$v['discount']['discount'].'%'.'</td>>';


            $orginalfee = $registrationfee->amount;
            $discount = $v['discount']['discount'];
            $discountablefee = $discount/100*$orginalfee;
            $finalfee = (float)$orginalfee-(float)$discountablefee;


            $html[$key]['tdsource'] .='<td>'.$finalfee.'TK'.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="Payslip" target="_blank" href="'.route("students.reg.fee.payslip").'?class_id='
                .$v->class_id.'&student_id='.$v->student_id.'" > Fee Slip</a>';
            $html[$key]['tdsource'] .='</td>';



        }
        return response()->json(@$html);

    }

    public function payslip(Request $request){
        $student_id = $request->student_id;
        $class_id = $request->class_id;
        $allStudent['std'] = AssignStudent::with(['discount','student'])->where('student_id',$student_id)->where('class_id',$class_id)->first();
        $pdf = PDF::loadView('backend.student.registration_fee.registration-fee-pdf', $allStudent);
        return $pdf->stream('document.pdf');
    }


}

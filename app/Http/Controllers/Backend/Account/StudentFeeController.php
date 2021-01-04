<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Model\AccountStudentFee;
use App\Model\AssignStudent;
use App\Model\FeeCategory;
use App\Model\FeeCategoryAmount;
use App\Model\StudentClass;
use App\Model\Year;
use Illuminate\Http\Request;

class StudentFeeController extends Controller
{
    public function view()
    {
        $data['allData'] = AccountStudentFee::all();
        return view('backend.account.student.fee-view',$data);
    }

    public function add()
    {
        $data['years'] = Year::orderBy('id','DESC')->get();
        $data['classes'] = StudentClass::all();
        $data['fee_categories'] = FeeCategory::all();
        return view('backend.account.student.fee-add',$data);
    }

    public function getStudent(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $fee_category_id = $request->fee_category_id;
        $date = date('Y-m',strtotime($request->date));
        $data = AssignStudent::with(['discount'])->where('year_id',$year_id)->where('class_id',$class_id)->get();

        $html['thsource'] = '<th>ID bo</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Father Name</th>';
        $html['thsource'] .= '<th>Original Fee</th>';
        $html['thsource'] .= '<th>Discount Amount</th>';
        $html['thsource'] .= '<th>Fee (This student)</th>';
        $html['thsource'] .= '<th>Select</th>';


        foreach ($data as $key => $std){
            $registrationfee = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->where('class_id',$std->class_id)->first();
            $accountsstudentfees = AccountStudentFee::where('student_id',$std->student_id)->where('year_id',$std->year_id)->where('class_id',$std->class_id)
                ->where('fee_category_id',$fee_category_id)->where('date',$date)->first();
            if ($accountsstudentfees !=null){
                $checked='checked';
            }else{
                $checked='';
            }
            $color = 'success';
            $html[$key]['tdsource'] ='<td>'.$std['student']['id_no'].'<input type="hidden" name="fee_category_id" value="'.$fee_category_id.'"></td>>';
            $html[$key]['tdsource'] .='<td>'.$std['student']['name'].'<input type="hidden" name="year_id" value="'.$std->year_id.'"></td>>';
            $html[$key]['tdsource'] .='<td>'.$std['student']['fname'].'<input type="hidden" name="class_id" value="'.$std->class_id.'"></td>>';
            $html[$key]['tdsource'] .='<td>'.$registrationfee->amount.'TK'.'<input type="hidden" name="date" value="'.$date.'"></td>>';
            $html[$key]['tdsource'] .='<td>'.$registrationfee->amount.'</td>>';
            $html[$key]['tdsource'] .='<td>'.$std['discount']['discount'].'%'.'</td>>';


            $orginalfee = $registrationfee->amount;
            $discount = $std['discount']['discount'];
            $discountablefee = $discount/100*$orginalfee;
            $finalfee = (int)$orginalfee-(int)$discountablefee;


            $html[$key]['tdsource'] .='<td>'.'<input type="text" name="amount[]" value="'.$finalfee.'" class="form-control" readonly>'.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<td>'.'<input type="hidden" name="student_id[]" value="'.$std->student_id.'">'.'
            <input type="checkbox" name="checkmanage[]" value="'.$key.'"'.$checked.' style="transform:scale(1.5);margin-left:10px">';
            $html[$key]['tdsource'] .='</td>';



        }
        return response()->json(@$html);
    }


    public function store(Request $request)
    {
        $date = date('Y-m',strtotime($request->date));
        $accountsstudentfees = AccountStudentFee::where('year_id',$request->year_id)->where('class_id',$request->class_id)
            ->where('fee_category_id',$request->fee_category_id)->where('date',$date)->delete();
        $checkData = $request->checkmanage;
        if ($checkData !=null){
            for($i=0; $i <count($checkData) ; $i++) {
                $data= new AccountStudentFee();
                $data->year_id = $request->year_id;
                $data->class_id = $request->class_id;
                $data->date = $date;
                $data->fee_category_id = $request->fee_category_id;
                $data->student_id = $request->student_id[$checkData[$i]];
                $data->amount = $request->amount[$checkData[$i]];
                $data->save();
            }
        }
        if (!empty(@$data) || empty($checkData)){
            return redirect()->route('accounts.fee.view')->with('success','Well done! successfully updated');
        }else{
            return redirect()->back()->with('error','sorry! Data not saved');
        }
    }
}

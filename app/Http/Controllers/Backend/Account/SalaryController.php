<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Model\AccountEmployeeSalary;
use App\Model\AccountStudentFee;
use App\Model\AssignStudent;
use App\Model\EmployeeAttedence;
use App\Model\FeeCategory;
use App\Model\FeeCategoryAmount;
use App\Model\StudentClass;
use App\Model\Year;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function view()
    {
        $data['allData'] = AccountEmployeeSalary::all();
        return view('backend.account.employee.salary-view',$data);
    }

    public function add()
    {
        $data['years'] = Year::orderBy('id','DESC')->get();
        $data['classes'] = StudentClass::all();
        $data['fee_categories'] = FeeCategory::all();
        return view('backend.account.employee.salary-add',$data);
    }

    public function getStudent(Request $request)
    {
        $date = date('Y-m',strtotime($request->date));
        if ($date !=''){
            $where[] = ['date','like',$date.'%'];
        }
        $data = EmployeeAttedence::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();
        $html['thsource'] = '<th>SL</th>';
        $html['thsource'] .= '<th>ID No</th>';
        $html['thsource'] .= '<th>Employee Name</th>';
        $html['thsource'] .= '<th>Basic Salary</th>';
        $html['thsource'] .= '<th>Salary (This Month)</th>';
        $html['thsource'] .= '<th>Select</th>';


        foreach ($data as $key => $attend){
            $account_salary = AccountEmployeeSalary::where('employee_id',$attend->employee_id)->where('date',$date)->first();
            if ($account_salary !=null){
                $checked='checked';
            }else{
                $checked='';
            }
            $totalattend = EmployeeAttedence::with(['user'])->where($where)->where('employee_id',$attend->employee_id)->get();
            $absentcount = count($totalattend->where('attend_status','Absent'));

            $html[$key]['tdsource'] ='<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .='<td>'.$attend['user']['id_no'].'<input type="hidden" name="date" value="'.$date.'"></td>';
            $html[$key]['tdsource'] .='<td>'.$attend['user']['name'].'</td>';
            $html[$key]['tdsource'] .='<td>'.$attend['user']['salary'].'</td>';

            $salary = (float)$attend['user']['salary'];
            $salaryperday = (float)$salary/30;
            $totalsalaryminus = (float)$absentcount*(float)$salaryperday;
            $totalsalary = (float)$salary-(float)$totalsalaryminus;

            $html[$key]['tdsource'] .='<td>'.$totalsalary.'<input type="hidden" name="amount[]" value="'.$totalsalary.'" class="form-control" readonly>'.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<td>'.'<input type="hidden" name="employee_id[]" value="'.$attend->employee_id.'">'.'
            <input type="checkbox" name="checkmanage[]" value="'.$key.'"'.$checked.' style="transform:scale(1.5);margin-left:10px">';
            $html[$key]['tdsource'] .='</td>';



        }
        return response()->json(@$html);
    }


    public function store(Request $request)
    {
        $date = date('Y-m',strtotime($request->date));
        AccountEmployeeSalary::where('date',$date)->delete();
        $checkData = $request->checkmanage;
        if ($checkData !=null){
            for($i=0; $i <count($checkData) ; $i++) {
                $data = new AccountEmployeeSalary();
                $data->date = $date;
                $data->employee_id = $request->employee_id[$checkData[$i]];
                $data->amount = $request->amount[$checkData[$i]];
                $data->save();
            }
        }
        if (!empty(@$data) || empty($checkData)){
            return redirect()->route('accounts.salary.view')->with('success','Well done! successfully updated');
        }else{
            return redirect()->back()->with('error','sorry! Data not saved');
        }
    }
}

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Monthly/Yearly Info</title>

    <style>
        table{
            border-collapse: collapse;
        }
        h2,h3{
            margin: 0;
            padding: 0;
        }
        .table{
            width: 100%;
            margin-bottom: 1rem;
            background: transparent;
        }
        .table th,
        .table td{
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
        .table thead th{
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }
        .table tbody + tbody {
            border-top: 2px solid #dee2e6;
        }
        .table .table{
            background: #fff;
        }
        .table-bordered{
            border: 1px solid #dee2e6;
        }
        .table-bordered th,
        .table-bordered td{
            border: 1px solid #dee2e6;
        }

        .table-bordered thead th,
        .table-bordered thead td{
            border-bottom-width: 2px;
        }
        .text-center{
            text-align: center;
        }

        .text-right{
            text-align: right;
        }
        table tr td{
            padding: 5px;
        }

        .table-bordered thead th, .table-bordered td, .table-bordered th{
            border: 1px solid black !important;
        }
        .table-bordered thead th{
            background-color: #cacaca;
        }

    </style>

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table width="80%">
                <tr>
                    <td width="33%" class="text-center"><img src="{{url('public/upload/no_image.png')}}" alt="" style="width: 100px; height: 100px"> </td>
                    <td class="text-center" width="63%">
                        <h4><strong>nawab habibullah</strong></h4>
                        <h4><strong>dhaka uttara azompur</strong></h4>
                        <h4><strong>www.google.com</strong></h4>
                    </td>
                    <td class="text-center">

                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-12 text-center">
            <h5 style="font-weight: bold; padding-top: -25px;">Monthly/Yearly Info</h5>
        </div>
        <div class="col-md-12">
            @php
                $student_fee = App\Model\AccountStudentFee::whereBetween('date',[$sdate, $edate])->where('fee_category_id','2')->sum('amount');
         $other_cost = App\Model\AccountOtherCost::whereBetween('date',[$start_date, $end_date])->sum('amount');
         $emp_salary = App\Model\AccountEmployeeSalary::whereBetween('date',[$sdate, $edate])->sum('amount');
         $total_cost = $other_cost+$emp_salary;
         $profit = $student_fee-$total_cost;


            @endphp


            <table border="1" width="100%">
                <tbody>
                <tr>
                    <td style="width: 50%; text-align: center;" colspan="2" > <h4>Reporting Date: {{date('d M Y',strtotime($start_date))}} - {{date('d M Y', strtotime($end_date))}}</h4> </td>

                </tr>

                <tr>
                    <td style="width: 50%">Purpose</td>
                    <td > <h4>Amount</h4> </td>

                </tr>
                <tr>
                    <td style="width: 50%">Student Fee</td>
                    <td>{{$student_fee}} TK</td>
                </tr>

                <tr>
                    <td style="width: 50%">Employee Salary</td>
                    <td>{{$emp_salary}} TK</td>
                </tr>

                <tr>
                    <td style="width: 50%">Other Cost</td>
                    <td>{{$other_cost}} TK</td>
                </tr>
                <tr>
                    <td style="width: 50%">Total Cost</td>
                    <td>{{$total_cost}} TK</td>
                </tr>
                <tr>
                    <td style="width: 50%">profit</td>
                    <td>{{$profit}} TK</td>
                </tr>

                </tbody>
            </table>
            <i style="font-size: 10px; float: right;">print date: {{date("d M Y")}}</i>
        </div>
    </div><br>
    <div class="col-md-12">
        <table border="0" width="100%">
            <tbody>
            <tr>
                <td style="width: 30%"></td>
                <td style="width: 30%"></td>
                <td style="width: 30%; text-align: center;">
                    <hr style="border: solid 1px; width: 60%; color: #000; margin-bottom: 0px">
                    <p style="text-align: center"> Principal/Headmaster</p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

</div>
</body>
</html>

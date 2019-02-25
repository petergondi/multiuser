<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accounts;
use App\Spendings;
use Carbon\Carbon;
use App\Topup;
use App\Offset;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class SpendingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $total_topup=Topup::sum('topup');
        $total_expense=Spendings::sum('expense_amount');
        $balance=$total_topup-$total_expense;
        $last_topup=DB::table('topup')->latest('id')->first();
        //foreach( $last_topups as $last){
        //    $last_topup=$last;
        //}
        //$offsets=Offset::latest()->take(1)->get();
        $offsets=DB::table('offset')->latest('id')->first();
             $sum=$offsets;
        $spendings=Spendings::orderBy('id', 'DESC')->paginate(10);
        return view('expenditure-management.view')->with(compact('spendings','balance','total_expense','sum','last_topup'));
    }
    //showing the table for posting expenditure
    public function create()
    {
        //
       $now =Carbon::now()->format('m-d-Y');
        $weekMap = [
            0 => 'Sunday',
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
        ];

        $dayOfTheWeek = Carbon::now()->dayOfWeek;
        $weekday = $weekMap[$dayOfTheWeek];
        $total_topup=Topup::sum('topup');
        $total_expense=Spendings::sum('expense_amount');
        $balance=$total_topup;
        $expense_accounts=Accounts::All();
        $count= $expense_accounts->count();
        return view('expenditure-management.create')->with(compact('expense_accounts','total_topup','weekday','now','balance'));
       
    }
    //
    public function ReadData(){
        $total_topup=Topup::sum('topup');
        $total_expense=Spendings::sum('expense_amount');
        $balance=$total_topup-$total_expense;
        return response($balance);
    }
    public function downloadPDF(){
        $data = ['title' => 'Welcome to HDTuto.com'];
        $pdf = PDF::loadView('pdf', $data);
  
        return $pdf->download('itsolutionstuff.pdf');
  
      }
    public function store(Request $request)
    {
        //
        $expense_accounts=Accounts::All();
        $data = array();
        $now = Carbon::now();
        $now->format('d/m/Y');
        $total_topup=Topup::sum('topup');
        $total_expense=Spendings::sum('expense_amount');
        $balance=$total_topup-$total_expense;
       
    
    foreach($request->account as $key=>$account)
       {
           
        if($request->vat){
            $vat="yes";
        }
        else{
            $vat="no";
        }
      
           
          //pushing expense amount into another array for deduction from the balance
           $new_amounts[] =$request->amount[$key];
          $data[] =[
                    'expense_name' =>  $account,
                    'purpose'=>$request->purpose[$key],
                    'person_given'=>$request->person[$key],
                    'expense_amount'=>$request->amount[$key],
                    'VAT'=>($request->vat? true : false),
                    'closing_balance'=>$balance-array_sum($new_amounts), 
                    'created_at'=>$now,
                    'updated_at'=>$now,
                   ];    
                  
               }   
              
        Spendings::insert($data);
       // if (Spendings::insert($data)) {
       //     return response([
       //         'status'     => 'success',
       //         'expense_name' =>  $account,
       //         'expense_amount'=>$request->amount[$key],
       //         ]);
       // } else {
       //     return response([
       //         'status' => 'error']);
       // }
        return redirect('admin/spendings/view')->with('success','Cost Expense Added');
    
}
//live search data
public function search(Request $request)
 
{
 
if($request->ajax())
 
{
 
$output="";
if($request->select=="person_given"){
    $expenses=Spendings::where('person_given','LIKE','%'.$request->search."%")->get();
    if($expenses)
    {
        $output.='<tr>
        <th>Expense Name</th>
        <th>Date</th>
        <th>Person Given.</th>
        <th>Purpose</th>
        <th>Amount Given(ksh.)</th>
        <th>Closing Balance</th>
        <th>Setting</th>
    </tr>';
     
    foreach ($expenses as $key => $expense) {
     
    $output.='<tr>'.
     
    '<td>'.$expense->expense_name.'</td>'.
    '<td>'.$expense->created_at->format('d/m/Y').'</td>'.
     
    '<td>'.$expense->purpose.'</td>'.
     
    '<td>'.$expense->person_given.'</td>'.
     
    '<td>'.$expense->expense_amount.'</td>'.
    '<td>'.$expense->closing_balance.'</td>'.
    '<td>'.
    '<button href="#" class="view alert-info" title="View" data-toggle="tooltip">'.'<i class="material-icons">'.'&#xE417;'.'</i>'.'</button>'.
    '<button href="#" class="edit alert-primary" title="Edit" data-toggle="tooltip">'.'<i class="material-icons">'.'&#xE254;'.'</i>'.'</button>'.
    '<button href="#" class="delete alert-danger" title="Delete" data-toggle="tooltip">'.'<i class="material-icons">'.'&#xE872;'.'</i>'.'</button>'
    .'</td>'.
     
    '</tr>';
     
    }
    return Response($output);
       }
        else{
        $output.='<tr>
        <td align="center" colspan="5">No Data matches your Search</td>
    </tr>';
       }
}
 
if($request->select=="expense"){
    $expenses=Spendings::where('expense_name','LIKE','%'.$request->search."%")->get();
    if($expenses)
    {
        
     
    foreach ($expenses as $key => $expense) {
     
    $output.='<tr>'.
     
    '<td>'.$expense->expense_name.'</td>'.
    '<td>'.$expense->created_at->format('d/m/Y').'</td>'.
     
    '<td>'.$expense->purpose.'</td>'.
     
    '<td>'.$expense->person_given.'</td>'.
     
    '<td>'.$expense->expense_amount.'</td>'.
    '<td>'.$expense->closing_balance.'</td>'.
    '<td>'.
        '<button href="#" class="view alert-info" title="View" data-toggle="tooltip">'.'<i class="material-icons">'.'&#xE417;'.'</i>'.'</button>'.
        '<button href="#" class="edit alert-primary" title="Edit" data-toggle="tooltip">'.'<i class="material-icons">'.'&#xE254;'.'</i>'.'</button>'.
        '<button href="#" class="delete alert-danger" title="Delete" data-toggle="tooltip">'.'<i class="material-icons">'.'&#xE872;'.'</i>'.'</button>'
    .'</td>'.
     
    '</tr>';
     
    }
    return Response($output);
       }
       else{
        $output.='<tr>
        <td align="center" colspan="5">No Data matches your Search</td>
    </tr>';
       }
       
}
 
$expenses=Spendings::where('expense_name','LIKE','%'.$request->search."%")->orWhere('person_given','LIKE','%'.$request->search."%")->orWhere('created_at','LIKE','%'.$request->search."%")->get();
if($expenses)
{
   
 
foreach ($expenses as $key => $expense) {
 
$output.='<tr>'.
 
'<td>'.$expense->expense_name.'</td>'.
'<td>'.$expense->created_at->format('d/m/Y').'</td>'.
 
'<td>'.$expense->purpose.'</td>'.
 
'<td>'.$expense->person_given.'</td>'.
 
'<td>'.$expense->expense_amount.'</td>'.
'<td>'.$expense->closing_balance.'</td>'.
'<td>'.
    '<button href="#" class="view alert-info" title="View" data-toggle="tooltip">'.'<i class="material-icons">'.'&#xE417;'.'</i>'.'</button>'.
        '<button href="#" class="edit alert-primary" title="Edit" data-toggle="tooltip">'.'<i class="material-icons">'.'&#xE254;'.'</i>'.'</button>'.
        '<button href="#" class="delete alert-danger" title="Delete" data-toggle="tooltip">'.'<i class="material-icons">'.'&#xE872;'.'</i>'.'</button>'
.'</td>'.
 
'</tr>';
 
}
return Response($output);
   }
   else{
    $output.='<tr>
    <td align="center" colspan="5">No Data matches your Search</td>
</tr>';
return Response($output);
   }
  
}
}
 
 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //find all ids where  the id records are greater than the deleted id
        $affected_columns=Spendings::where('id', '>', $id+1)->pluck('closing_balance');
       //if($affected_columns){
       $deleted_amount=Spendings::where('id',$id)->pluck('expense_amount');
       $immediate_closingbalance=Spendings::where('id',$id+1)->pluck('closing_balance');
        $balance=$deleted_amount[0]+$immediate_closingbalance[0];
       $new_amounts =  explode(',', $affected_columns);
       //$all=array_push( $immediate_closingbalance, $new_amounts );
      //return response($balance);  
     //Spendings::where('id', '=', $id+1)->update($balance);
        // }
       
            $page = Spendings::find($id+1);
            while($page==true){
                $page->closing_balance = $balance;
                $page->save();
            }
           
       
        
        Spendings::find($id)->delete();
        //return response()->json(['success'=>'Data is Deleted']);
        
    }
}

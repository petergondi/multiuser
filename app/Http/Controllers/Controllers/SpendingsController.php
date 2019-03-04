<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accounts;
use App\Spendings;
use Carbon\Carbon;
use App\Topup;
use App\Offset;
use App\Expense;
use App\User;
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
        $expense_offset=Expense::max('deleted_amount');
        return view('expenditure-management.view')->with(compact('spendings','balance','total_expense','sum','last_topup','expense_offset'));
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
        $persons=User::All();
        $balance=$total_topup;
        $expense_accounts=Accounts::All();
        $count= $expense_accounts->count();
        return view('expenditure-management.create')->with(compact('expense_accounts','total_topup','weekday','now','balance','persons'));
       
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
       $deleted_amount=Spendings::where('id',$id)->pluck('expense_amount');
       $immediate_closingbalance=Spendings::where('id','>',$id)->take(1)->pluck('closing_balance');
       $immediate_closingbalance_id=Spendings::where('id','>',$id)->take(1)->pluck('id');
       $top_id=Spendings::where('id','>',$id)->get();
        //find all ids affected after deletion is done 
        $affected_columns=Spendings::where('id', '>',$immediate_closingbalance_id)->get();
        $balance=$deleted_amount[0]+$immediate_closingbalance[0];
       //$new_amounts =  explode(',', $affected_columns);
        //adding the deleted expense to the immediate closing balance
                //$page = Spendings::find($immediate_closingbalance_id);
                //if($page){
                //    $page[0]->closing_balance = $balance;
                //    $page[0]->save();
                //}
//


            //using the immediate closing balance to deduct all the affected expenses(expenses incured after the deleted expense)
           // if($affected_columns){
           //     foreach($affected_columns as $column){
           //         $new_amounts[] =$column;
           //         $data[]=[
           //             'closing_balance'=>$balance-array_sum($new_amounts),
           //         ];   
           //     }
           // }
           //$data[]=Spendings::max('id');//->update(['deleted_amount'=>$deleted_amount[0]]);
           if($top_id->count()>0){
            $previous=Expense::All();
            if($previous->count()>0) {
            foreach($previous as $current){
                $new=$current->deleted_amount;
            }        
        }
        else {
            $new=0;
       }
       $data=new Expense;
       $data->deleted_amount = $deleted_amount[0] +$new;
       $data->save();
       $total_topup=Topup::sum('topup');
       $total_expense=Spendings::sum('expense_amount');
       $total_expenses= $total_expense-$deleted_amount[0];
       $bal=$total_topup-$total_expenses;
       Spendings::find($id)->delete(); 
      // return response($data->deleted_amount);
       return response()->json(['response'=>'success','bal'=>$bal,'total_expenses'=>$total_expenses,'deleted'=>$data->deleted_amount]);
           }
           else{
            $previous=Expense::All();
            if($previous->count()>0) {
            foreach($previous as $current){
                $new=$current->deleted_amount;
            } 
        }       
        else {
            $new=0;
       }
       $data=new Expense;
       $data->deleted_amount = $deleted_amount[0] +$new;
       $data->save();
       $total_expense=Spendings::sum('expense_amount');
       $total_expenses= $total_expense-$deleted_amount[0];
       $bal=$total_topup-$total_expenses;
       Spendings::find($id)->delete(); 
      // return response($data->deleted_amount);
       return response()->json(['response'=>'success','bal'=>$bal,'total_expense'=>$total_expenses,'deleted'=>$data->deleted_amount]);
           }
          
           //$data=Spendings::max('id');
       
        //return response()->json(['success'=>'Data is successfully added']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Topup;
use App\Spendings;
use App\Offset;
class TopupController extends Controller
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
        $mpesa=Topup::where('account_type','mpesa')->sum('topup');
        $cash=Topup::where('account_type','cash')->sum('topup');
        $bank=Topup::where('account_type','bank')->sum('topup');
        $total_topup=Topup::sum('topup');
        $topups=Topup::orderBy('id', 'DESC')->paginate(10);
        return view('topup-management.view')->with(compact('topups','total_topup','mpesa','cash','bank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $total_topup=Topup::sum('topup');
        $total_expense=Spendings::sum('expense_amount');
        $balance=$total_topup-$total_expense;
        return view('topup-management.make')->with(compact('balance'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'account'=>'required',
            'topup'=>'required',
        ]);
        $petty_cashier=Auth::user()->firstname;
        $total_topup=Topup::sum('topup');
        $total_expense=Spendings::sum('expense_amount');
        $balance=$total_topup-$total_expense;
        $total=$balance+$request->input('topup');
        $post=new Topup;
        $post->account_type=$request->input('account');
        $post->topup=$request->input('topup');
        $post->petty_cashier= $petty_cashier;
        $post->save();
        //return redirect('/topup/view')->with('success','You made a topup');
        return response($total);
        
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
        $mpesa=Topup::where('account_type','mpesa')->sum('topup');
        $cash=Topup::where('account_type','cash')->sum('topup');
        $bank=Topup::where('account_type','bank')->sum('topup');
        $total_topup=Topup::sum('topup');
        $amount=Topup::where('id',$id)->first();
        
            $offset=new Offset;
            $test=$amount->topup;
            $offset->amount=$test;
            $offset->save();
        $topup = new Topup;
        $topup = Topup::find($id);
        $topup->delete($id);
       return response()->json(['response' => 'success', 'total_topup' =>  $total_topup,'mpesa'=>$mpesa,'cash'=>$cash,'bank'=>$bank]);
    
    }
}

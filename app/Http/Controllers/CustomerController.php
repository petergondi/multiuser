<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
      //showing customers
      public function customers()
      {
          $customers= Customer::paginate(15);
          return view('customers.view',compact('customers'));
      }
 
    public function add(Request $request)
    {
        //add new customer
        $check_customer=Customer::where('email',$request->email)->first();
        if(!$check_customer){
            $customer=new Customer;
            $customer->customer_name=$request->name;
            $customer->location=$request->location;
            $customer->email=$request->email;
            $customer->contact=$request->phone;
            $customer->save();
            return response("new person added");
        }
       
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //populating new customers into the taskdropdown
    public function newCustomers()
      {
          $customers= Customer::All();
          foreach($customers as $customer){
            $newcustomers[]=$customer->customer_name;
        }
          return response($newcustomers);
      }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if($request->ajax()){
     $results=Customer::where('email',$request->search)->orWhere('contact',$request->search)->first();  
     if($results->count()>0){
         $name=$results->customer_name;
         $email=$results->email;
         $contact=$results->contact;
         $location=$results->location;
         return response()->json(['name' =>$name,'email'=>$email,'contact'=>$contact,'location'=>$location]);
     }   
    // else{
    //    return response()->json(['error' => 'Search result not found']);
    // }
     
    }
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
        Customer::where('id', $id)->delete();
    }
}

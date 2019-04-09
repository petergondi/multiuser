<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\Tasks;
use App\Task;
use App\Customer;
use App\User;
use App\Reply;
use PHPMailer\PHPMailer;
use Redirect;

class UserTaskController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    protected $usertasks;
    public function userTask(){
        $userlogged=Auth::user()->id;
       // checking for authenticated user's task 
           $usertasks=Task::where('asignee_id', $userlogged)->orderBy('id','desc')->get();
           if($usertasks->count()>0){
            $usernew_task=Task::where('asignee_id',$userlogged)->where('status','no')->count();
               return view('task-management.usertask')->with(compact('usertasks','usernew_task','userlogged')); 
        }
        //for debbugin purposes to be removed later
       else{
          return view('task-management.nousertask');
        }
        
    }
    //show quotations 
    public function quotations(){
        $logged_in=Auth::user()->id;
        // checking for authenticated user's quotation 
            $quotations=Task::where('asignee_id', $logged_in)->orderBy('id','desc')->get();
            if( $quotations->count()>0){
             $usernew_quotations=Task::where('asignee_id',$logged_in)->where('reason','quotation')->where('response',0)->count();
             $usernew_invoice=Task::where('asignee_id',$logged_in)->where('reason','invoice')->where('response',0)->count();
             return view('task-management.quotations')->with(compact('quotations','usernew_quotations','usernew_invoice','logged_in')); 
         }
         //for debbugin purposes to be removed later
        else{
            return view('task-management.usertask')->with(compact('usertasks','usernew_task','userlogged')); 
         }
        
    }
    //show specific quotation
    public function showQuotation($id)
    {
     $quotation=Task::find($id);
     if($quotation){
        return view('task-management.quotation',compact('quotation'));
     }
     else{
        return view('task-management.quotations')->with('error','the task has been terminated');
     }
    
    }
    //upload invoice or quotation
    public function fileUploadPost(Request $request,$name,$email,$topic,$id)
    {
        try {
        $request->validate([
            'file.*' => 'required|file|max:5000|mimes:pdf,docx,doc',
        ]);
        
            $fileName = $name.time().'.'.request()->file->getClientOriginalExtension();
            $check=request()->file->move(public_path('files'), $fileName);
            if($check){
                
            $mail             = new PHPMailer\PHPMailer(); // create a n
            $mail->AddEmbeddedImage("assets/images/move.png", "my-attach", "assets/images/move.png");
            $text             = 'Dear '.$name. 'find the attached invoice/quotation thanks! <img src=\"cid:my-attach\" />';
            $mail->IsSMTP();
            //$mail->SMTPDebug = 2;
            $mail->SMTPAuth   = true; // authentication enabled
            $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
            $mail->Debugoutput = 'html';
            $mail->Host       = "smtp.gmail.com";
            $mail->Port       = 587;
            $mail->IsHTML(true);
            $mail->Username = "gondipeters@gmail.com";
            $mail->Password = "Fireworks@2019";
            $mail->SetFrom("gondipeters@gmail.com", 'Movetech');
            $mail->Subject = $topic;
            $mail->Body    = $text;
            $mail->AddAttachment("files/".$fileName);
            $mail->AddAddress($email, $name);
            $mail->From="mailer@example.com";
           $mail->FromName="Movetech Solution";
           $mail->Sender="movetech@gmail.com"; // indicates ReturnPath header
            if ($mail->Send()) {
                $check_sent_email=Task::find($id);
                $check_sent_email->response=1;
                $check_sent_email->save();
                //return "sent";
                return redirect('users/quotations/view')->with('success','Quotation/Invoice Sent!! to '.$name);
            } else {
                //return "not sent";
                return Redirect::back()->withErrors(['error', 'The email could not be sent']);
            }
            }
        }
        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
          }
    }
}

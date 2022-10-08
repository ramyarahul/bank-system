<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Models\UserProfile;
use App\Models\Account;

use Illuminate\Support\Facades\Auth;

class AccountsController extends Controller
{
    public function profile(){
         return view('profile');
    }
    public function createProfile(Request $request){
        $data = $request->all();
        $check = $this->profilecreate($data);
        return redirect("dashboard")->withSuccess('You have signed-in');
    }
    public function withdraw(){
        return view('withdraw');
    }
    public function transfer()
    {
        return view('transfer');
    }
    public function statement()
    {
        $transactions = Account::all()->where('user_id',Auth::User()->id); 
        $user_profiles=UserProfile::first('outstanding_amount',Auth::User()->id);
        $outstanding = $user_profiles['outstanding_amount'];
        return view('statement',compact('transactions','outstanding'));
    }
    public function profilecreate(array $data){
        return UserProfile::create([
            'user_id' => Auth::User()->id,
            'account_number'=>$data['accountnumber'],
            'outstanding_amount'=>$data['outstanding']
        ]); 
    }
    public function deposit(){
        return view('deposit');
    }
    public function depositAmount(Request $request)
    {
        $data=$request->all();
        $check = $this->depositIntoAccount($data);
        return redirect("dashboard")->withSuccess('depositted successfully');
    }
    public function depositIntoAccount(array $data)
    {
        return Account::create([
            'user_id' => Auth::User()->id,
            'credit'=>$data['amount'],
            'debit'=>0,
            'remarks'=>'deposit'
        ]); 
    }
    public function withdrawAmount(Request $request)
    {
        $data=$request->all();
        $check= $this->withdrawFromAmount($data);
        return redirect("dashboard")->withSuccess('withdraw successfully');
    }
    public function withdrawFromAmount(array $data)
    {
        return Account::create([
            'user_id' => Auth::User()->id,
            'credit'=>0,
            'debit'=>$data['amount'],
            'remarks'=>'withdraw',
        ]); 
    }
    public function transferAmount(Request $request)
    {
        $data=$request->all();
        $check=$this->TransferAmountBetween($data);
        return redirect("dashboard")->withSuccess('Transfered successfully');
    }
    public function TransferAmountBetween(array $data)
    {
        if (Auth::User()->email == $data['emailfrom']) {
            return Account::create([
            'user_id' => Auth::User()->id,
            'credit'=>0,
            'debit'=>$data['amount'],
            'remarks'=>'Transfer to'.' '.$data['emailto']
        ]); 
        }
        elseif (Auth::User()->email == $data['emailto']) {
            return Account::create([
            'user_id' => Auth::User()->id,
            'credit'=>$data['amount'],
            'debit'=>0,
            'remarks'=>'Transfer from'.' '.$data['emailfrom']
        ]);            
        }else{
            return redirect('transfer')->withSuccess('cant transfer money');
        }
    }
    
}

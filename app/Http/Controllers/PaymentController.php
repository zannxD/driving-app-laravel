<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Customer;
use App\Exam;
use App\Payment;

class PaymentController extends Controller
{

    public function index()
    {
      $payments=Payment::where('date',Input::get('paymentDate'))->get();
      return response()->json(['data'=>$payments],200);
    }


    public function create()
    {

    }


    public function store(Request $request)
    {

        $payment=Payment::create([
          'customer_id'=>Input::get('cid'),
          'description'=>Input::get('remarks'),
          'type'=>Input::get('type'),
          'amount'=>Input::get('amount'),
          'date'=>Input::get('paymentDate')
        ]);
        return response()->json(['data','Payments saved successfully'],200);
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $payment=Payment::find($id);
        return response()->json(['payment'=>$payment],200);
    }


    public function update(Request $request, $id)
    {
        $payment=Payment::find($id)->update([
          'customer_id'=>Input::get('cid'),
          'description'=>Input::get('remarks'),
          'type'=>Input::get('type'),
          'amount'=>Input::get('amount'),
          'date'=>Input::get('paymentDate')
        ]);
        return response()->json(['data'=>'Payments updated successfully'],200);
    }


    public function destroy($id)
    {
        $payment=Payment::find($id);
        $payment->delete();
        return response()->json(['data'=>'Payments deleted successfully'],200);

    }
}

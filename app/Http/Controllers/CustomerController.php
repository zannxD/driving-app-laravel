<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Customer;

class CustomerController extends Controller
{

  public function index()
  {
    $customers=Customer::where('status',Input::get('status'))->get();
    return response()->json(['data'=>$customers],200);

  }

  public function create()
  {

  }

  public function store(Request $request)
  {
   
    $customer=Customer::create([
      'fullname'=>Input::get('name'),
      'date_of_admission'=>Input::get('joinDate'),
      'nic'=>Input::get('nic'),
      'phone1'=>Input::get('phone1'),
      'phone2'=>Input::get('phone2'),
      'address'=>Input::get('address'),
      'remarks'=>Input::get('remarks'),
      'total_price'=>Input::get('totalfees'),

    ]);
      return response()->json(['data'=>'Customer Saved Successfully'],200);
  }


  public function show($id)
  {
    $customer=Customer::find($id);
    // $exams=Exams::where('customer_id',$id)->get();
    // $payments=Payment::all();
    return response()->json(['customer'=>$customer],200);
  }

  public function edit($id)
  {
    $customer=Customer::find($id);
    return response()->json(['data'=>$customer],200);
  }


  public function update(Request $request, $id)
  {
    $customer=Customer::find($id)->update([
      'fullname'=>Input::get('name'),
      'date_of_admission'=>Input::get('joinDate'),
      'nic'=>Input::get('nic'),
      'phone1'=>Input::get('phone1'),
      'phone2'=>Input::get('phone2'),
      'address'=>Input::get('address'),
      'remarks'=>Input::get('remarks'),
      'total_price'=>Input::get('totalfees'),
      'status'=>Input::get('status')

    ]);
      return response()->json(['data'=>'Customer Updated Successfully'],200);
  }


  public function destroy($id)
  {
    //
  }
}

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
class ExamController extends Controller
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

    $exams=Exam::create([
      'customer_id'=>Input::get('cid'),
      'date'=>Input::get('dateFormat'),
      'code'=>Input::get('code'),
      'type'=>Input::get('type'),
      'time'=>Input::get('time'),

    ]);
    return response()->json(['data'=>'Successfully saved exams'],200);
  }


  public function show($id)
  {

  }


  public function edit($id)
  {
    $exam=Exam::find($id);
    return response()->json(['exam'=>$exam],200);
  }


  public function update(Request $request, $id)
  {
    $customer=Customer::find($id)->update([
      'customer_id'=>Input::get('cid'),
      'date'=>date("Y/m/d",strtotime(Input::get('examDate'))),
      'code'=>Input::get('code'),
      'type'=>Input::get('type'),
      'time'=>Input::get('time'),
      'applying_date'=>Input::get('aplyingDate'),
      'status'=>Input::get('status'),
    ]);
    return response()->json(['data'=>'Successfully updated exams'],200);
  }


  public function destroy($id)
  {
    $exam=Exam::find($id);
    $exam->delete();
    return response()->json(['data'=>'Successfully deleted exams'],200);
  }
}

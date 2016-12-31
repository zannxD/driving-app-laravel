<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentReports;
use App\Customer;
use App\Payment;
use App\Exam;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $y = date('Y');
        $m = date('m');

        $payments = array();

        for($i=0; $i<6; $i++){
            if($m < 1){
               $m = 12;
               $y = $y-1;
           }
           $pay = PaymentReports::where('year',$y)->where('month',$m)->get();

           array_push($payments,$pay);

            $m--;
        }

        // active customers count->integer
        $active_customers=Customer::where('status'==="active")->get();
        $count=count($active_customers);

        // customers registed this year ->integer -> where('joinDate','LIKE','2016%')     //'2016-10-10'
        $cusomers_this_year=Customer::where('date_of_admission','LIKE',$y,'%')->get();
        // money Due -> total price - paid
        // $cus=Customer::select('total_price')->get();


        return response()->json(['payments'=>$payments,'count'=>$count,'cusomers_this_year',$cusomers_this_year],200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }
}

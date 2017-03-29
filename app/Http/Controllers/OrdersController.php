<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Input, Redirect;

class OrdersController extends Controller
{
    //
    public function show(Request $request){
		  $numberOfPeople = $request->get('numberOfPeople');
		  $totalWithoutTip = $request->get('totalWithoutTip');
		  $totalWithTip="";
		  $valueForEach="";
		  $serviceValue= $request->get('service');
		  $isRound=$request->get('round');

      return view('orders.submitted')->with([
            'numberOfPeople' => $numberOfPeople,
            'totalWithoutTip' => $totalWithoutTip,
            'serviceValue' => $serviceValue,
            'isRound' => $isRound,
            'valueForEach'=>$valueForEach,
             ]);
    }

    public function submitted(Request $request){

      $this->validate($request,[
      'numberOfPeople'=> 'required|min:1',
      'totalWithoutTip'=> 'required',
      ]);



      $numberOfPeople = $request->get('numberOfPeople');
      $totalWithoutTip = $request->get('totalWithoutTip');
      $totalWithTip="";
      $valueForEach="";
      $serviceValue= $request->get('service');


        if ($serviceValue =='E'){
          $totalWithTip=$totalWithoutTip+($totalWithoutTip*0.2);

          }
        elseif ($serviceValue =='G'){
          $totalWithTip=$totalWithoutTip+($totalWithoutTip*0.15);

          }
        else{
          $totalWithTip=$totalWithoutTip+($totalWithoutTip*0.05);

          }
        $isRound=$request->get('round');
           if ($numberOfPeople >=1){
              if ($isRound=='true'){
              $valueForEach = round($totalWithTip /$numberOfPeople) ;
              }else{
              $valueForEach = $totalWithTip /$numberOfPeople ;}
            }




      return view('orders.submitted')->with([
            'numberOfPeople' => $numberOfPeople,
            'totalWithoutTip' => $totalWithoutTip,
            'serviceValue' => $serviceValue,
            'isRound' => $isRound,
            'valueForEach'=>$valueForEach,
             ]);

}
}

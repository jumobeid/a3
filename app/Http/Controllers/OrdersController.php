<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Input, Redirect;

class OrdersController extends Controller
{
    //
    public function show($title = null){
      return view('orders.show')->with([
        'title'=>$title,
      ]);
    }
    public function submitted(Request $request){


      //$numberOfPeople="";



      $numberOfPeople = $request->get('numberOfPeople');
      $totalWithoutTip = $request->get('totalWithoutTip');
      $totalWithTip="";
      $valueForEach="0";
      $serviceValue= $request->get('service');
      /*$this->validate($request,[
      'numberOfPeople'=> 'required|min:1',
      'totalWithoutTip'=> 'required',
    ]);*/
      $validator = Validator::make(
        array(
            'numberOfPeople' => '',
            'totalWithoutTip' => ''

        ),
        array(
            'numberOfPeople' => 'required|min:1',
            'totalWithoutTip' => 'required'
        )
      );
    $errors = $validator->messages();
    dump($errors);
    dump(count($errors));
    dump($errors->all());

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

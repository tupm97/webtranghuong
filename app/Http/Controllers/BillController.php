<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\BillDetail;
class BillController extends Controller
{
    public function allBill(){
        $bills =Bill::all();
        $billdetails = BillDetail::all();
        return view('shop.allbill',compact('bills','billdetails'));
    }
    public function billDetail($id){
		$bill = Bill::findorfail($id);
        $billdetails = BillDetail::where('bill_id',$id)->get();
        return view('shop.billdetail',compact('billdetails','bill'));
    }
}

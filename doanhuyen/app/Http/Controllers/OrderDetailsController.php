<?php

namespace App\Http\Controllers;
use App\OrderDetails;
use App\Oder;
use Illuminate\Http\Request;
class OrderDetailsController extends Controller
{
    public function getAll()
    {
    	$oder_details = OrderDetails::paginate(10);
    	return view('admin.orderdetails.list',['oder_details'=>$oder_details]);
    }    
}

<?php
namespace App\Http\Controllers;
use App\Oder;
use App\Customer;
use Carbon\Carbon;
use App\OrderDetails;
use App\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class OrderController extends Controller
{
    public function getAll()
    {
    	    $oder = Oder::paginate(8);
    	    return view('admin.oder.list',['oder'=>$oder]);
    }
    public function postAll(Request $request)
    {
       $search = $request->timkiem;
       $oder = Oder::where('name','like',"%$search%")->orwhere('id_user','like',"$search")->paginate(10);
       return view('admin.oder.list',['oder'=>$oder]);
    }
    public function getEdit($id)
    {      
           $user= User::all();
           $oder = Oder::find($id); 
           return view('admin.oder.edit',['oder'=>$oder,'user'=>$user]);
    }
     public function postEdit(Request $request,$id)
    {
    	 $oder = Oder::find($id);
    	  $this->validate($request,
        	[],[]);
       $oder->status= $request->status;
        $oder->save();
    return redirect('admin/hoadon/sua/'.$id)->with('thongbao','Bạn Đã Cập Nhật Trạng Thái  Hóa Đơn Thành Công');
    }
     public function getOrderDetails($id)
     {
            $order = Oder::find($id);
            $order_details = OrderDetails::where('order_id',$id)->get();
            return view('admin.oder.order_details',['order'=> $order,'order_details'=> $order_details]);
     }
     public function getDasboard()
     {                            
           $das =DB::table('order')->join('users', 'order.id_user', '=', 'users.id')->orderby('order.created_at','desc')->select('order.id', 'order.id_user', 'users.name','order.address','order.phone_number','order.total_price','order.created_at','order.status')->take(10)->get();

            $now=Carbon::now(); 
            $co =Oder::where('created_at','>=',$now->toDateString()." ".'00:00:00')
            ->where('created_at','<=',$now->toDateString()." ".'23:59:59')->get(); 

             $ytd=Carbon::yesterday();
             $ytd11= $ytd->toDateString();
              $co1 =Oder::where('created_at','>=',$ytd->toDateString()." ".'00:00:00')
            ->where('created_at','<=',$ytd->toDateString()." ".'23:59:59')->get(); 


               $ytd1=$ytd->subDays(1);
               $ytd12 = $ytd1->toDateString();
              $co2=Oder::where('created_at','>=',$ytd1->toDateString()." ".'00:00:00')
             ->where('created_at','<=',$ytd1->toDateString()." ".'23:59:59')->get(); 

               
              $ytd2=$ytd1->subDays(1);
              $ytd13 =$ytd2->toDateString();
              $co3=Oder::where('created_at','>=',$ytd2->toDateString()." ".'00:00:00')
             ->where('created_at','<=',$ytd2->toDateString()." ".'23:59:59')->get(); 
         
               $ytd3=$ytd2->subDays(1);
               $ytd14=$ytd3->toDateString();
              $co4=Oder::where('created_at','>=',$ytd3->toDateString()." ".'00:00:00')
             ->where('created_at','<=',$ytd3->toDateString()." ".'23:59:59')->get(); 
                 
              $ytd4=$ytd3->subDays(1);
               $ytd15=$ytd4->toDateString();
              $co5=Oder::where('created_at','>=',$ytd4->toDateString()." ".'00:00:00')
             ->where('created_at','<=',$ytd4->toDateString()." ".'23:59:59')->get(); 

              $ytd5=$ytd4->subDays(1);
               $ytd16=$ytd5->toDateString();
              $co6=Oder::where('created_at','>=',$ytd5->toDateString()." ".'00:00:00')
             ->where('created_at','<=',$ytd5->toDateString()." ".'23:59:59')->get(); 
             
            return view('admin.dasboard.home',['das'=>$das,'co'=>$co,'co1'=>$co1,'co2'=>$co2,'co3'=>$co3,'co4'=>$co4,'co5'=>$co5,'co6'=>$co6,'dtNow'=>$now,'ytd11'=>$ytd11,'ytd12'=>$ytd12,'ytd13'=>$ytd13,'ytd14'=>$ytd14,'ytd15'=>$ytd15,'ytd16'=>$ytd16]);
     }


}

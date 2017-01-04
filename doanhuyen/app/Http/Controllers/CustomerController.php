<?php

namespace App\Http\Controllers;
use App\Customer;use App\Oder;use Illuminate\Http\Request;
class CustomerController extends Controller
{
   public function getAll()
    {
    	$customer = Customer::paginate(5);;
    	return view('admin.customer.list',['customer'=>$customer]);
    }
    public function getEdit($id)
    {
          $customer = Customer::find($id);
          return view('admin.customer.edit',['customer'=>$customer]);
    }

    public function postEdit(Request $request,$id)
    {
    	 $customer = Customer::find($id);
    	 $this->validate($request,
        	[
        	 'ten' =>'required',
        	 'dienthoai' =>'required|min:10|max:11',
        	 'diachi' =>'required',      	
        	],
        	[
        	 'ten.required'=>'Bạn chưa nhập tên ',
        	 'dienthoai.required'=>'Bạn chưa số điện thoại ',
        	 'dienthoai.min'=>'Số điên thoại phải từ lớn hơn 10 số và nhỏ hơn 11 số ',
        	 'dienthoai.max'=>'Số điên thoại phải từ lớn hơn 10 số và nhỏ hơn 11 số ',
        	
        	 'diachi.required'=>'Bạn chưa nhập địa chỉ '       	 
        	]);
      $customer->fullname=$request->ten;
      $customer->phone_number=$request->dienthoai;
      $customer->address=$request->diachi; 
      $customer->save();
        return redirect('admin/khachhang/sua/'.$id)->with('thongbao','Sửa khách hàng Thành Công');

    }

    public function getDelete($id)
    {
         $customer = Customer::find($id);
        $customer ->delete();
        return redirect('admin/khachhang/danhsach')->with('thongbao','Xóa Thành Công');
    }
    public function getOrder($id)
    {
       $customer = Customer::find($id);
       $order = Oder::where('customer_id',$id)->get();
       return view('admin.customer.order',['customer'=>$customer,'order'=>$order]);
    }
}

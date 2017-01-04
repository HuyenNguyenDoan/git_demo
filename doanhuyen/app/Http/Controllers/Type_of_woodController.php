<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Type_of_wood;
class Type_of_woodController extends Controller
{
    public function getAll()
    {
    	$typewood = Type_of_wood::all();
    	return view('admin.Type_of_wood.list',['typewood'=>$typewood]);
    }
    public function getAdd()
    {
    	return view('admin.Type_of_wood.add');
    }
    public function postAdd(Request $request)
    {
        $this->validate($request,
        	[
               'ten' => 'required|min:2|max:100|unique:type_of_wood,name'
        	],
        	[
               'ten.required' =>'Bạn chưa nhập tên loại gỗ',
               'ten.min' =>'Tên loại gỗ phải từ 3 đến 100 ký tự',
               'ten.max' =>'Tên loại gỗ phải từ 3 đến 100 ký tự',
               'ten.unique' =>'Tên loại gỗ đã tồn tại'
        	]);
        $typewood = new Type_of_wood;
        $typewood->name = $request->ten;
        $typewood->hot_type_of_wood = $request->hottype;
        $typewood->save();
        return redirect('admin/loaigo/them')->with('thongbao','Thêm thành công. '); 
    }
     public function getEdit($id)
    {
  	    $typewood = Type_of_wood::find($id);
        return view('admin.type_of_wood.edit',['typewood'=>$typewood]);
    }
    public function postEdit(Request $request,$id)
    {
        $typewood = Type_of_wood::find($id);
          $this->validate($request,
          	[
               'ten'=>'required|min:2|max:100|unique:type_of_wood,name'
          	],
          	[
              'ten.required' =>'Bạn chưa nhập tên Loại Gỗ',
               'ten.min' =>'Tên Loại Gỗ phải từ 3 đến 100 ký tự',
               'ten.max' =>'Tên Loại Gỗ phải từ 3 đến 100 ký tự',
               'ten.unique' =>'Tên Loại Gỗ đã tồn tại'
          	]);
         $typewood->name = $request->ten;
         $typewood->hot_type_of_wood = $request->hottype;
         $typewood->save();
         return redirect('admin/loaigo/sua/'.$id)->with('thongbao','Sửa Thành Công');
    }
    public function getDelete($id)
    {
        $typewood = Type_of_wood::find($id);
        $typewood->delete();
        return redirect('admin/loaigo/danhsach')->with('thongbao','Xóa Thành Công');
    }
}

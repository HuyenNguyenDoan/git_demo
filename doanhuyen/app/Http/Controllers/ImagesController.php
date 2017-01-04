<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Images;
use App\Product;
class ImagesController extends Controller
{
     public function getAll()
     {
            $image= Images::paginate(12);
            return view('admin.image.list',['image'=> $image]);
     }

      public function getAdd()
     {
     	$product= Product::all();
     	return view('admin.image.add',['product'=>$product]);
     }
      public function postAdd(Request $request)
     {
     	   	
        $image = new Images;
       
        if($request->hasFile('hinh'))
        {
             $file= $request->file('hinh');
             $name = $file->getClientOriginalName();
               $hinh = str_random(4)."_".$name;
               while (file_exists("uploads/product/".$hinh)) {
                   $hinh = str_random(4)."_".$name;
               }
               $file->move("uploads/product",$hinh);
                $image->images=$hinh;
        }
        $image->id_product = $request->hinhanhsp;
        $image->save();
        return redirect('admin/hinhanh/them')->with('thongbao','Thêm thành công Hình Ảnh. ');
     }

     public function getEdit($id)
     {
     	$image =Images::find($id);
     	$product=Product::all();
     	return view('admin.image.edit',['image'=>$image,'product'=>$product]);
     }
      public function postEdit(Request $request,$id)
     {
        $image =Images::find($id);
        //anh
        if($request->hasFile('hinh'))
        {
             $file= $request->file('hinh');
             $name = $file->getClientOriginalName();
               $hinh = str_random(4)."_".$name;
               while (file_exists("uploads/product/".$hinh)) {
                   $hinh = str_random(4)."_".$name;
               }
               unlink("uploads/product/".$image->images);
               $file->move("uploads/product",$hinh);
               $image->images=$hinh;
        }
        $image->id_product = $request->hinhanhsp;
        $image->save();
        return redirect('admin/hinhanh/sua/'.$id)->with('thongbao','Sửa thành công Hình ảnh. ');
     }
      public function getDelete($id)
     {
     	$image = Images::find($id);
     	$image->delete();
     	 return redirect('admin/hinhanh/danhsach')->with('thongbao','Xóa thành công Hình ảnh. ');
     }
}

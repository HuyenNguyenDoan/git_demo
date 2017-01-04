<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\Type_of_wood;
use App\Comments;use Illuminate\Http\Request;
class ProductController extends Controller
{
     public function getAll() 
    {
      $product = Product::paginate(10);
    	return view('admin.product.list',['product'=>$product]);
    }
    public function postAll(Request $request)
    {
      $search = $request->timkiem;
      $product = Product::where('name','like',"%$search%")->orwhere('id','like',"%$search%")->paginate(10);
      return view('admin.product.list',['product'=>$product]);
    }
    public function getAdd()
    {
    	$category = Category::all();
    	$typewood = Type_of_wood::all();
    	return view('admin.product.add',['category'=>$category],['typewood'=>$typewood]);
    }
    public function postAdd(Request $request)
    {
        $this->validate($request,
        	[
               'ten' => 'required|min:3|max:100|unique:product,name',
               'gia'=>'required',
               'danhmuc'=>'required',
               'loaigo'=>'required',
               'soluong'=>'required'
        	],
        	[
               'ten.required' =>'Bạn chưa nhập tên sản phẩm',
               'ten.min' =>'Tên sản phẩm phải từ 3 đến 100 ký tự',
               'ten.max' =>'Tên sản phẩm phải từ 3 đến 100 ký tự',
               'ten.unique' =>'Tên sản phẩm đã tồn tại',
               'gia.required' =>'Bạn chưa nhập giá sản phẩm',
               'danhmuc.required' =>'Bạn chưa nhập danh mục sản phẩm',
               'loaigo.required' =>'Bạn chưa nhập loại gỗ của sản phẩm',
               'soluong.required'=>'Bạn chưa nhập số lượng cho sản phẩm'
        	]);
         $product = new Product;
         $product->name= $request->ten;
         $product->price= $request->gia;
         $product->view = 0;
           if($request->hasFile('hinh'))
	         {
                   $file = $request->file('hinh');
                   $duoi= $file->getClientOriginalExtension();
                   if($duoi !='jpg' && $duoi !='png' && $duoi !='jpeg')
                   {
                      redirect('admin/sanpham/them')->with('loi','Bạn chỉ được nhập file ảnh jpg,png,jpeg');
                   }
                   $name = $file->getClientOriginalName();
                   $hinh= str_random(4)."_".$name;
                   while (file_exists("uploads/product/".$hinh)) {
                   	 $hinh= str_random(4)."_".$name;
                   }
                   $file->move("uploads/product",$hinh);
                   $product->images=$hinh;
	         }
         else
	         {   
	          $product->images="";
	         }
         $product->category_id =$request->danhmuc;
         $product->Type_of_wood_id =$request->loaigo;
         $product->description = $request->mota;
         $product->quantity =$request->soluong;
         $product->hot_product = $request->hotpro;
        $product->save();
       return redirect('admin/sanpham/them')->with('thongbao','Thêm Sản Phẩm  thành công. '); 
    }
    public function getEdit($id)
    {

    	$product = Product::find($id);
    	$category = Category::all();
    	$typewood = Type_of_wood::all();
        return view('admin.product.edit',
        	['product'=>$product,
        	 'category'=>$category,
        	 'typewood'=>$typewood]);
    }
    public function postEdit(Request $request,$id)
    {
         $product = Product::find($id);
         
          $this->validate($request,
        	[
               'ten' => 'required|min:3|max:100|unique:product,name',
               'gia'=>'required',
               'danhmuc'=>'required',
               'loaigo'=>'required',
               'soluong'=>'required'

        	],
        	[
               'ten.required' =>'Bạn chưa nhập tên sản phẩm',
               'ten.min' =>'Tên sản phẩm phải từ 3 đến 100 ký tự',
               'ten.max' =>'Tên sản phẩm phải từ 3 đến 100 ký tự',
               'ten.unique' =>'Tên sản phẩm đã tồn tại',
               'gia.required' =>'Bạn chưa nhập giá sản phẩm',
               'danhmuc.required' =>'Bạn chưa nhập danh mục sản phẩm',
               'loaigo.required' =>'Bạn chưa nhập loại gỗ của sản phẩm',
               'soluong.required'=>'Bạn chưa nhập số lượng cho sản phẩm'

        	]);
         $product->name= $request->ten;
         $product->price= $request->gia;
           if($request->hasFile('hinh'))
	         {
                   $file = $request->file('hinh');
                   $duoi= $file->getClientOriginalExtension();

                   if($duoi !='jpg' && $duoi !='png' && $duoi !='jpeg')
                   {
                      redirect('admin/sanpham/them')->with('loi','Bạn chỉ được nhập file ảnh jpg,png,jpeg');
                   }
                   $name = $file->getClientOriginalName();

                   $hinh= str_random(4)."_".$name;

                   while (file_exists("uploads/product/".$hinh)) {
                   	 $hinh= str_random(4)."_".$name;
                   }
                   unlink("uploads/product/".$product->images);
                   $file->move("uploads/product",$hinh);
                   $product->images=$hinh;
	         }
        
         $product->category_id =$request->danhmuc;
         $product->Type_of_wood_id =$request->loaigo;
         $product->description = $request->mota;
         $product->quantity =$request->soluong;
         $product->hot_product = $request->hotpro;
         $product->save();
         return redirect('admin/sanpham/sua/'.$id)->with('thongbao','Sửa Thành Công');
    }
    public function getDelete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('admin/sanpham/danhsach')->with('thongbao','Xóa Thành Công');
    }
}

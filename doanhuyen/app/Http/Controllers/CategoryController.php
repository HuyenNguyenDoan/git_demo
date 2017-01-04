<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function getAll()
    {
    	$category = Category::paginate(3);
    	return view('admin.category.list-cate',['category'=>$category]);
    }
    public function getAdd()
    {
    	return view('admin.category.add');
    }
    public function postAdd(Request $request)
    {
        $this->validate($request,
        	[
               'ten' => 'required|min:2|max:100|unique:category,name'
        	],
        	[
               'ten.required' =>'Bạn chưa nhập tên danh mục',
               'ten.min' =>'Tên danh mục phải từ 3 đến 100 ký tự',
               'ten.max' =>'Tên danh mục phải từ 3 đến 100 ký tự',
               'ten.unique' =>'Tên danh mục đã tồn tại'
        	]);
        $category = new Category;
        $category->name = $request->ten;
        $category->hot_category = $request->hotcate;
        $category->save();
        return redirect('admin/danhmuc/them')->with('thongbao','Thêm thành công. '); 
    }
    public function getEdit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',['category'=>$category]);
    }
    public function postEdit(Request $request,$id)
    {
         $category =Category::find($id);
          $this->validate($request,
          	[
               'ten'=>'required|min:2|max:100|unique:category,name'
          	],
          	[
              'ten.required' =>'Bạn chưa nhập tên danh mục',
               'ten.min' =>'Tên danh mục phải từ 3 đến 100 ký tự',
               'ten.max' =>'Tên danh mục phải từ 3 đến 100 ký tự',
               'ten.unique' =>'Tên danh mục đã tồn tại'
          	]);
         $category->name = $request->ten;
         $category->hot_category = $request->hotcate;
         $category->save();
         return redirect('admin/danhmuc/sua/'.$id)->with('thongbao','Sửa Thành Công');
    }
    public function getDelete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('admin/danhmuc/danhsach')->with('thongbao','Xóa Thành Công');
    }

}

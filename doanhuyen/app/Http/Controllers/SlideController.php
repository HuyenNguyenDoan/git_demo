<?php

namespace App\Http\Controllers;
use App\Slides;
use Illuminate\Http\Request;
class SlideController extends Controller
{
     public function getAll()
     {
            $slide = Slides::all();
            return view('admin.slides.list',['slide'=> $slide]);
     }
      public function getAdd()
     {
     	return view('admin.slides.add');
     }
      public function postAdd(Request $request)
     {
     	$this->validate($request,
        	[
               'tieude' => 'required|min:3|max:100|unique:slides,title'
        	],
        	[
               'tieude.required' =>'Bạn chưa nhập tiêu đề slide',
               'tieude.min' =>'Tên slides phải từ 3 đến 100 ký tự',
               'tieude.max' =>'Tên slides phải từ 3 đến 100 ký tự',
               'tieude.unique' =>'Tên slides đã tồn tại'
        	]);
        $slide = new Slides;
        $slide->title = $request->tieude;
        if($request->hasFile('hinh'))
        {
             $file= $request->file('hinh');
             $name = $file->getClientOriginalName();
               $hinh = str_random(4)."_".$name;
               while (file_exists("uploads/slidershow/".$hinh)) {
                   $hinh = str_random(4)."_".$name;
               }
               $file->move("uploads/slidershow",$hinh);
                $slide->image=$hinh;
        }
        $slide->link = $request->link;
        $slide->save();
        return redirect('admin/slide/them')->with('thongbao','Thêm thành công. ');
     }
      public function getEdit($id)
     {
     	$slide =Slides::find($id);
     	return view('admin.slides.edit',['slide'=>$slide]);
     }
      public function postEdit(Request $request,$id)
     {
        $slide =Slides::find($id);
     	$this->validate($request,
        	[
               'tieude' => 'required|min:3|max:100'
        	],
        	[
               'tieude.required' =>'Bạn chưa nhập tiêu đề slide',
               'tieude.min' =>'Tên slides phải từ 3 đến 100 ký tự',
               'tieude.max' =>'Tên slides phải từ 3 đến 100 ký tự',     
        	]);
     	$slide->title = $request->tieude;
        //anh
        if($request->hasFile('hinh'))
        {
             $file= $request->file('hinh');
             $name = $file->getClientOriginalName();
               $hinh = str_random(4)."_".$name;
               while (file_exists("uploads/slidershow/".$hinh)) {
                   $hinh = str_random(4)."_".$name;
               }
               unlink("uploads/slidershow/".$slide->image);
               $file->move("uploads/slidershow",$hinh);
               $slide->image=$hinh;
        }
        $slide->link = $request->link;
        $slide->save();
        return redirect('admin/slide/sua/'.$id)->with('thongbao','Sửa thành công. ');
     }
      public function getDelete($id)
     {
     	$slide = Slides::find($id);
     	$slide->delete();
     	 return redirect('admin/slide/danhsach')->with('thongbao','Xóa thành công. ');
     }

}

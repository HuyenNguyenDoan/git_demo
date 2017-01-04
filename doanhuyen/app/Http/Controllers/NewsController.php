<?php

namespace App\Http\Controllers;use App\News;use Illuminate\Http\Request;
class NewsController extends Controller
{
    public function getAll()
    {
    	$new = News::paginate(4);
    	return view('admin.news.list',['new'=>$new]);
    }
    public function getAdd()
    {
      return view('admin.news.add');
    }
    public function postAdd(Request $request)
    {
        $new = new News;
        $this->validate($request,
        	[
        	   'tieude'=>'required|min:6|max:300|unique:news,title',
        	    'noidung'=>'required',
        	],
        	[
        	   'noidung.required'=>'Bạn chưa nhập tiêu đề cho tin tức',
               'tieude.required'=>'Bạn chưa nhập tiêu đề cho tin tức',
               'tieude.min'=>'Tiêu đề cho tin tức từ 6 đến 100 ký tự',
               'tieude.max'=>'Tiêu đề cho tin tức từ 6 đến 100 ký tự',
               'tieude.unique'=>'Tiêu đề tin tức đã tồn tại'
        	]);
          $new->title= $request->tieude;
          $new->content=$request->noidung;
           if($request->hasFile('hinh'))
           {
              $file = $request->file('hinh');
              $name = $file->getClientOriginalName();
              $hinh = str_random(4)."_".$name;
              $file->move("uploads/news",$hinh);
              $new->images= $hinh;
           } 
           else
           {
           	 $new->images= "";
           }
          $new->hot_news=$request->hotnew;
         $new->save();
         return redirect('admin/tintuc/them')->with('thongbao','Thêm tin tức thành công');
    }
      public function getEdit($id)
    {
         $new = News::find($id);
         return view('admin.news.edit',['new'=>$new]);
    }
    public function postEdit(Request $request,$id)
    {
    	  $new = News::find($id);
    	 $this->validate($request,
        	[
        	   'tieude'=>'required|min:6|max:300',
        	    'noidung'=>'required',
        	],
        	[
        	   'noidung.required'=>'Bạn chưa nhập tiêu đề cho tin tức',
               'tieude.required'=>'Bạn chưa nhập tiêu đề cho tin tức',
               'tieude.min'=>'Tiêu đề cho tin tức từ 6 đến 100 ký tự',
               'tieude.max'=>'Tiêu đề cho tin tức từ 6 đến 100 ký tự',  
        	]);
           $new->title= $request->tieude;
           $new->content=$request->noidung;
           if($request->hasFile('hinh'))
           {
              $file = $request->file('hinh');
              $name = $file->getClientOriginalName();
              $hinh = str_random(4)."_".$name;
              $file->move("uploads/news",$hinh);
              $new->images= $hinh;
           }  
          $new->hot_news=$request->hotnew;
           $new->save();
          return redirect('admin/tintuc/sua/'.$id)->with('thongbao','Sửa tin tức thành công');
    }
    public function getDelete($id)
    {
         $new = News::find($id);
         $new->delete();
         return redirect('admin/tintuc/danhsach')->with('thongbao','Xóa tin tức thành công');
    }
}

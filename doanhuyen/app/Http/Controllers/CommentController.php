<?php

namespace App\Http\Controllers;
use App\Comments;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class CommentController extends Controller
{
    public function getDelete($id,$idpr)
    {
          $comment = Comments::find($id);
          $comment->delete();
          return redirect('admin/sanpham/sua/'.$idpr)->with('thongbao','Xóa bình luận thành công');
    }
    public function postComment(Request $request,$id)
    {
      $id_product=$id;
      $product=Product::find($id);
      $comment = new Comments;
      $comment->id_product=$id_product;
      $comment->id_user= Auth::user()->id;
      $comment->content = $request->noidung;
      $comment->save();
      return redirect("chitietsanpham/$id".$product->name.".html")->with('thongbao','Bình luận thành công');
    }
}

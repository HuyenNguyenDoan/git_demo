<?php

namespace App\Http\Controllers;
use Request;
use App\Category;
use App\Type_of_wood;
 use App\News;
 use App\Slides;
 use Illuminate\Support\Facades\Auth;
 use App\Product;
 use App\Comments;
 use App\Contact;
 use App\Customer;
 use Cart,Session;
class CartController extends Controller
{
	function __construct(Request $request)
	{  
		  $category = Category::where('hot_category','=','1')->get();
	    $typewood= Type_of_wood::where('hot_type_of_wood','=','1')->get();
	    $news = News::where('hot_news','=','1')->orderBy('id','desc')->take(5)->get();
	    $slide = Slides::all();
	    $product = Product::where('hot_product','=','1')->orderBy('id','desc')->take(21)->get();
      $other_product = Product::where('hot_product','=','0')->get();  
	    view()->share(['category'=>$category,'typewood'=>$typewood,
	    'news'=>$news,'slide'=>$slide,'product'=>$product,'other_product'=>$other_product]);
      if(Auth::check())
      {
        view()->share('nguoidung',Auth::user());
      }
	}
     public function getAddCart($id)
   {
     $product_cart= Product::where('id',$id)->first();
     Cart::add(array('id'=>$id,'name'=>$product_cart->name,'qty'=>1,'price'=>$product_cart->price,'options'=>array('img'=>$product_cart->images)));
      $content = Cart::content();
      return redirect('trangchu');   
   }
   public function Cart()
   {
    $content = Cart::content();
    $subtotal = Cart::subtotal();
     return view('pages.cart',['content'=>$content,'subtotal'=>$subtotal]);
   }
    public function DeleteItem($id)
    {
      Cart::remove($id);
      return redirect('giohang');
    }
    public function Update()
    {
      if(Request::ajax())
      {
        $id=Request::get('id');
        $qty=Request::get('qty');
        Cart::update($id,$qty);
        return "oke";
      }   
      return redirect('giohang');
    }
    public function DestroyCart()
    {
      Cart::destroy();
      return redirect('giohang');
    }

    
   



    



}

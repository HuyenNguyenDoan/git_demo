<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;use App\Type_of_wood;
 use App\News;
 use App\Slides;
 use Illuminate\Support\Facades\Auth;
 use App\Product;
 use App\Comments;
 use App\Contact;
 use Cart;
 use App\Images;
 use App\Oder;
 use App\OrderDetails;
 use App\Customer;
 use Session;
class ClientController extends Controller
{
	function __construct(Request $request)
	{  
		  $category = Category::where('hot_category','=','1')->get();
	    $typewood= Type_of_wood::where('hot_type_of_wood','=','1')->get();
	    $news = News::where('hot_news','=','1')->orderBy('id','desc')->take(5)->get();
	    $slide = Slides::all();
	    $product = Product::where('hot_product','=','1')->orderBy('id','desc')->take(21)->get();
      $other_product = Product::where('hot_product','=','0')->get();
       $list_news = News::paginate(4);   
	    view()->share(['category'=>$category,'typewood'=>$typewood,
	    'news'=>$news,'slide'=>$slide,'product'=>$product,'other_product'=>$other_product,'list_news'=>$list_news]);
      if(Auth::check())
      {
        view()->share('nguoidung',Auth::user());
      }
	}
   public function home()
   {  
    return view('pages.home');
   }
   public function getNews()
   {
    return view('pages.news');
   }
   public function getContact()
   {
    return view('pages.contact');
   }
    public function postContact(Request $request)
   { 
    $contact = new Contact;
        $this->validate($request,
          [
           'ten' =>'required',
           'dienthoai' =>'required|min:10|max:11',
           'email' =>'required',
           'diachi' =>'required',
           'noidung' =>'required',
          ],
          [
           'ten.required'=>'Bạn chưa nhập tên Người Liên hệ',
           'dienthoai.min'=>'Số điên thoại phải từ lớn hơn 10 số và nhỏ hơn 11 số ',
           'dienthoai.max'=>'Số điên thoại phải từ lớn hơn 10 số và nhỏ hơn 11 số ',
           'email.required'=>'Bạn chưa nhập email',
           'noidung.required'=>'Bạn chưa nhập nội dung',
           'diachi.required'=>'Bạn chưa nhập địa chỉ người liên hệ'   
          ]);
      $contact->fullname=$request->ten;
      $contact->phone_number=$request->dienthoai;
      $contact->email=$request->email;
      $contact->address=$request->diachi;
      $contact->content=$request->noidung;
      $contact->save();
       return redirect('lienhe')->with('thongbao','Bạn Đã  Liên Hệ Thành Công');
   }
   public function category($id)
   {
    $categories = Category::find($id);
    $products  = Product::where('category_id',$id)->paginate(3);
    return view('pages.category',['categories'=>$categories,'products'=>$products]);
   }
    public function type_of_wood($id)
   {
    $type_of_wood = Type_of_wood::find($id);
    $products  = Product::where('type_of_wood_id',$id)->paginate(3);
    return view('pages.type_of_wood',['type_of_wood'=>$type_of_wood,'products'=>$products]);
   }
   public function details($id)
   {
    $product_details = Product::find($id);
    $product_details =Product::where('id','=',$id)->get();
    $image =  Images::where('id_product','=',$id)->get();
    $comment =Comments::where('id_product','=',$id)->get();
     return view('pages.details_product',
      ['product_details'=>$product_details,'comment'=>$comment,'image'=>$image]);
   }
   public function getLogin()
   {
    return view('pages.login');
   }
   public function postLogin(Request $request)
   {
      $this->validate($request,
            [
              'email' =>'required',
              'password'=>'required|min:4|max:32'
            ],          
            [
              'email.required' =>'Bạn chưa Nhập Email',
              'password.required' =>'Bạn chưa Nhập Mật khẩu',
              'password.min' => 'Mật khẩu phải từ 4 ký tự đến 32 ký tự',
              'password.max' => 'Mật khẩu phải từ 4 ký tự đến 32 ký tự'
            ]);
         if (Auth::attempt(['email'=>$request->email ,'password'=>$request->password])) {
                 return redirect('trangchu'); 
         }
         else
         {
           return redirect('dangnhap')->with('thongbao','Đăng nhập không thành công');
         }
   }
   public function getLogout()
   {
    Auth::logout();
    return redirect('dangnhap');
   }
   public function getUser()
   {
       $user = Auth::user();
      return view('pages.users',['user'=>$user]);
   }
    public function postUser(Request $request)
   {
      $user = Auth::user();
       $this->validate($request,
          [
           'name' =>'required|min:2',
           'password'=>'required|min:4',
           'email' =>'required'
          ],
          [
           'name.required'=>'Bạn chưa nhập tên Người dùng',
           'name.min'=>'Tên người dùng phải từ 2 ký tự trở lên',
           'password.required'=>'Bạn chưa nhập Mật khẩu Người dùng',
           'password.min'=>'Tên người dùng phải từ 4 ký tự trở lên',
           'email.required' =>'bạn chưa nhập Email',
          ]);
        $user->name=$request->name;
        $user->email =$request->email;
        $user->password = $request->password;
        $user->save();
        return redirect('nguoidung')->with('thongbao','Sửa NGười Dùng Thành Công');
   }
   public function getRegister()
   {
    return view('pages.register');
   }

   public function postRegister()
   {
   }
   public function postSearch(Request $request)
   {
       $search=$request->timkiem;
       $product_search=Product::where('name','like',"%$search%")->
       orWhere('id','like',"%$search%")->orWhere('price','like',"%$search%")->take(15)->get();
       return 
       view('pages.search',['search'=>$search,'product_search'=>$product_search]);
   }
  public function getOrder()
   {  
       return view('pages.cart');
   }
   public function postOrder(Request $request)
    {    
          $customer = new Customer();
          $content = Cart::content();
           if(Auth::user())
            {
             $oder = new Oder();
             $oder->id_user = Auth::user()->id;
             $oder->address =$request->diachin;
             $oder->phone_number =$request->sdtn;
             $oder->save();
                $total = 0;
                $content = Cart::content();
                foreach($content as $index => $item){
                  $order_details = new OrderDetails();
                  $order_details->order_id = $oder->id;
                  $order_details->product_id = $item->id;
                  $order_details->quantity = $item->qty;
                  $order_details->price = $item->price;
                  $order_details->total_price = $item->price * $item->qty;
                  $order_details->save();
                  $total += $item->price * $item->qty;
                }  
                $oder->total_price=$total;
                $oder->save();      
            }
            else
            {
               $customer = new Customer();
              $this->validate($request,
              [
               'tenkh' =>'required',
               'sdt' =>'required|min:10|max:11',
               'diachi' =>'required',
              ],
              [
               'tenkh.required'=>'Bạn chưa nhập tên ',
               'sdt.required'=>'Bạn chưa số điện thoại ',
               'sdt.min'=>'Số điên thoại phải từ lớn hơn 10 số và nhỏ hơn 11 số ',
               'sdt.max'=>'Số điên thoại phải từ lớn hơn 10 số và nhỏ hơn 11 số ',
               'diachi.required'=>'Bạn chưa nhập địa chỉ '
                ]);
                $customer->fullname=$request->tenkh;
                $customer->phone_number=$request->sdt;
                $customer->address=$request->diachi;
                $customer->save();
                $oder = new Oder();
                $oder->address = $customer->address;
                $oder->name=$customer->fullname;
                $oder->save();
                $total = 0;
                $content = Cart::content();
                foreach($content as $index => $item){
                  $order_details = new OrderDetails();
                  $order_details->order_id = $oder->id;
                  $order_details->product_id = $item->id;
                  $order_details->quantity = $item->qty;
                  $order_details->price = $item->price;
                  $order_details->total_price = $item->price * $item->qty;
                  $order_details->save();
                  $total += $item->price * $item->qty;
                }  
                $oder->total_price=$total;
                $oder->save();
              }
               Cart::destroy();
          return redirect('giohang')->with('thongbao','Bạn Đã Đặt Hàng Thành Công chúng tôi sẽ sớm giao hàng cho bạn.');
       }
      
 }

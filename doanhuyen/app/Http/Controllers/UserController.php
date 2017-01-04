<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;use Illuminate\Http\Request;
class UserController extends Controller
{ 
   public function getAll()
    {
    	$user = User::paginate(5);
    	return view('admin.user.list',['user'=>$user]);
    }
    public function postAll(Request $request)
    {
      $search = $request->timkiem;

      $user = User::where('name','like',"%$search%")->orwhere('id','like',"%$search%")->paginate(10);
      return view('admin.user.list',['user'=>$user]);
    }
    public function getAdd()
    {
    	return view('admin.user.add');
    }

    public function postAdd(Request $request)
    {
        $user = new User;
        $this->validate($request,
        	[
        	 'name' =>'required|min:2'
        	],
        	[
        	 'name.required'=>'Bạn chưa nhập tên Người dùng',
        	 'name.min'=>'Tên người dùng phải từ 2 ký tự trở lên', 
        	]);
        $user->name=$request->name;
        $user->email =$request->email;
        $user->password = $request->password;
        $user->level = $request->level;
        $user->save();
        return redirect('admin/nguoidung/them')->with('thongbao','Thêm NGười Dùng Thành Công');
    }
    public function getEdit($id)
    {
         $user = User::find($id);
         return view('admin.user.edit',['user'=>$user]);
    }
    public function postEdit(Request $request,$id)
    {
    	$user = User::find($id);
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
        $user->level = $request->level;
        $user->save();
        return redirect('admin/nguoidung/sua/'.$id)->with('thongbao','Sửa NGười Dùng Thành Công');
    }
    public function getDelete($id)
    {
    	$user = User::find($id);
    	$user->delete();
    	return redirect('admin/nguoidung/danhsach')->with('thongbao','Xóa NGười Dùng Thành Công');

    }
    public function getloginAdmin()
    {    
        return view('admin.login');
    }

    public function postloginAdmin(Request $request)
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
                 return redirect('admin/hoadon/thongke'); 
         }
         else
         {
           return redirect('admin/dangnhap')->with('thongbao','Đăng nhập không thành công');
         }
    }
    public function getlogoutAdmin()
    {
        Auth::logout();
        return redirect('admin/dangnhap');
    }
}

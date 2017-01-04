<?php

namespace App\Http\Controllers;use App\Contact;use Illuminate\Http\Request;
class ContactController extends Controller
{
     public function getAll()
    {
    	$contact = Contact::all();
    	return view('admin.contact.list',['contact'=>$contact]);
    }
    public function getDelete($id)
    {
    	$contact = Contact::find($id);
    	$contact->delete();
    	return redirect('admin/lienhe/danhsach')->with('thongbao','Xóa Liên Hệ Thành Công');
    }
}

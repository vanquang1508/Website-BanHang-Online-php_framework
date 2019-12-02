<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerValidate;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Customer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function __construct()
    {
        $dataCategory = Category::all();
        $dataBrand = Brand::all();
        view()->share(compact('dataCategory','dataBrand'));
    }
    public function create()
    {
        return view('Client.User.index');
    }

    public function store(CustomerValidate $request)
    {
        $customer_data = new Customer([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level'=>1,
            'postal_address' => $request->postal_address,
            'physical_address' => $request->physical_address
        ]);
        $customer_data->save();
        if($customer_data){
            return  redirect("dang-nhap")->with('thongbao','Đăng ký thành công');
        }else{
            return  redirect()->with('loi','Đăng ký không thành công');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerValidate;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerInfoController extends Controller
{
    function __construct()
    {
        $dataCategory = Category::all();
        $dataBrand = Brand::all();
        view()->share(compact('dataCategory','dataBrand'));
    }
    public function show($id)
    {
        $data = Customer::findOrFail($id);
        return view('Client.Customer.show',compact('data'));
    }
    public function edit($id){
        $data = Customer::findOrFail($id);
        return view("Client/Customer/update",compact('data'));
    }
    public function update(CustomerValidate $request, $id){
        $data = Customer::findOrFail($id);
        if ($data){
            $data->first_name = $request->first_name;
            $data->last_name = $request->last_name;
            $data->password = $request->password;
            $data->email = $request->email;
            $data->postal_address = $request->postal_address;
            $data->physical_address = $request->physical_address;
            $data->updated_at = Carbon::now()->toDateTimeString();
            $data->update();
        }else{
            return back()->with("thongbao",'Cập nhật thất bại');
        }
        return  redirect("home")->with('thongbao','Cập nhật thành công');
    }
}

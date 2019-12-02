<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CustomerValidate;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Carbon\Carbon;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = Customer::where('level','=',1)->orderBy('created_at', 'desc')->get();
        return view("Admin/Customer/index",compact('customers'));
    }

    public function create()
    {
    }

    public function store(CustomerValidate $request)
    {
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
        $data = Customer::findOrFail($id);
        $result = Order::where('customer_id', '=', $data->id)->get();
        if ($data && $result->count()==0){
            $data->delete();
        }else{
            return redirect("admin/customer")->with('thongbao','Dữ liệu đang được sử dụng bên sản phẩm!');
        }
        return redirect("admin/customer")->with('thongbao','Xóa thành công');
    }
}

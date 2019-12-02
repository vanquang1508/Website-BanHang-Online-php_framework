<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Str;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::orderBy('transaction_data','desc')->get();
        return view("Admin/Order/index",compact('orders'));
    }

    public function create()
    {
    }


    public function store(Request $request)
    {
    }

    public function show($id)
    {
        //
        $dataOrder = Order::findOrFail($id);
        $iDCustomer = $dataOrder->customer_id;
        $orderInfo = DB::table('orders')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->where('orders.customer_id', '=', $iDCustomer)
            ->where('order_details.order_id', '=',$id)
            ->select('orders.*', 'order_details.*', 'products.product_name as product_name')
            ->get();
               // dd($orderInfo);

        return view('Admin/Order/show',compact('dataOrder','orderInfo'));
    }

    public function edit($id)
    {
        $dataOrder = Order::findOrFail($id);
        $iDCustomer = $dataOrder->customer_id;
        $orderInfo = DB::table('orders')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->where('orders.customer_id', '=', $iDCustomer)
            ->where('order_details.order_id', '=',$id)
            ->select('orders.*', 'order_details.*', 'products.product_name as product_name')
            ->get();
        // dd($orderInfo);

        return view('Admin/Order/update',compact('dataOrder','orderInfo'));
    }

    public function update(Request $request, $id)
    {

        $data = Order::findOrFail($id);

        $data->status = $request->status;
        $data->updated_at = Carbon::now()->toDateTimeString();
        $data->update();
        return  redirect("admin/order")->with('thongbao','Cập nhật thành công');
    }

    public function destroy($id)
    {
        $data = Order::findOrFail($id);
        if ($data){
            $data->delete();
        }else{
            return redirect("admin/order")->with('thongbao','Xóa không thành công');
        }
        return redirect("admin/order")->with('thongbao','Xóa thành công');
    }
}

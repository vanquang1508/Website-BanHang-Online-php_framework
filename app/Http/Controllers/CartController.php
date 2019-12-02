<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session;

class CartController extends Controller
{
    function __construct()
    {
        $dataCategory = Category::all();
        $dataBrand = Brand::all();
        view()->share(compact('dataCategory','dataBrand'));
    }
    public function getAddCart($id){
        $product = Product::find($id);
        Cart::add(['id' => $id, 'name' => $product->product_name, 'qty' => 1, 'price' => $product->price, 'options' => ['image' => $product->image]]);
        return back()->with('thongbao','Thêm thành công');
    }
    public function getShowCart()
    {
        $data['total'] = Cart::total();
        $data['items'] = Cart::content();
        $data['customer'] = Customer::pluck('last_name','id')->toArray();
        return view('Client.Cart.Cart',$data);
    }
    public function getDeleteCart($id)
    {
        if ($id=='all'){
            Cart::destroy();
        }else{
            Cart::remove($id);
        }
        return back();
    }
    public function getUpdateCart(Request $request)
    {
        Cart::update($request->rowId,$request->qty);
    }
    public function thanhToanCart()
    {
            $user = Auth::user();
            $cartInfor = Cart::content();
            //Order
            $order = new Order([
                'order_number' => Str::random(10),
                'transaction_data' => Carbon::now('Asia/Ho_Chi_Minh'),
                'customer_id' => $user->id,
                'status' => 'Chưa giao',
                'total_amount' => str_replace(',', '', Cart::total())
            ]);
            $order->save();
            if (count($cartInfor) > 0) {
                foreach ($cartInfor as $key => $item) {
                    $orderDetail = new OrderDetail();
                    $orderDetail->order_id = $order->id;
                    $orderDetail->product_id = $item->id;
                    $orderDetail->quantity = $item->qty;
                    $orderDetail->price = $item->price;
                    $orderDetail->sub_total = $item->price * $item->qty;
                    $orderDetail->save();
                }
            }
            Cart::destroy();
            return redirect('/home')->with('thongbao','Đặt mua thành công');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\Product;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function  index(){
        $data['countOrder'] = Order::count();
        $data['countOrderStatus'] = Order::where('status','Chưa giao')->count();
        $data['countCustomer'] = Customer::where('level','=',1)->count();
        $data['sumTotalAmount'] = Order::where('status','Đã giao')->sum('total_amount');
        $dataOne = Order::get();
        $chartCategory = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select('categories.name')
            ->get()
        ;
        $chartBrand = DB::table('products')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->select('brands.name')
            ->get()
        ;
        $chart = Charts::database($dataOne, 'line', 'highcharts')
            ->title("Biểu đồ đơn hàng")
            ->elementLabel("Đơn hàng")
            ->groupByDay();
        $pie = Charts::database($chartCategory, 'pie ', 'highcharts')
            ->title("Biểu đồ sản phẩm theo thể loại")
            ->labels($chartCategory)
            ->groupBy('name');
        $pieBrand = Charts::database($chartBrand, 'bar ', 'highcharts')
            ->title("Biểu đồ sản phẩm theo nhà sản xuất")
            ->labels($chartBrand)
            ->elementLabel("Sản phẩm")
            ->groupBy('name');

        return view('Admin.Home.index',$data,compact('chart','pie','pieBrand'));
    }

    public function getLogout(){
        Auth::logout();
        return  redirect()->intended('login');
    }

}

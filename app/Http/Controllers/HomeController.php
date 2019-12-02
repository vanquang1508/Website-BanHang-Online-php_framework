<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class HomeController extends Controller
{
    function __construct()
    {
        $dataCategory = Category::all();
        $dataBrand = Brand::all();
        view()->share(compact('dataCategory','dataBrand'));
    }

    public function Index(){
        $data = Product::all();
        return view('Client.Home.index',compact('data'));
    }


    public function Category($id){
        $data = Product::where('category_id','=',$id)->get();
        return view('Client.Home.index',compact('data'));
    }

    public function Brand($id){
        $data = Product::where('brand_id','=',$id)->get();
        return view('Client.Home.index',compact('data'));
    }

    public function  ShowProduct($id){
        $data = Product::findOrFail($id);
        return view('Client.Home.show',compact('data'));
    }
}

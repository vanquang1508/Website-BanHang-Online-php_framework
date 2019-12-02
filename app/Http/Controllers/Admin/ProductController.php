<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\ProductValidate;
use App\Models\Brand;
use App\Models\Category;
use App\Models\OrderDetail;
use App\Models\Product;
use Faker\Provider\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view("Admin/Product/index",compact('products'));
    }

    public function create()
    {
        $brand = Brand::pluck('name','id')->toArray();
        $category = Category::pluck('name','id')->toArray();
        return view('Admin/Product/create',compact('brand','category'));
    }

    public function store(ProductValidate $request)
    {
//        dd($request);
        $product_code = Str::random(10);
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png')
            {
                return redirect('admin/product/create')->with('thongbao','Bạn chỉ được chọn file jpg,png');
            }
            $Hinh = str_random(4)."_".$name;
            while(file_exists("Upload/Product/".$Hinh))
            {
                $Hinh = str_random(4)."_". $name;
            }
            $file->move("Upload/Product/",$Hinh);
            $request->image = $Hinh;
        }else
        {
            $request->image = "";
        }

        $product_data = new Product([
            'product_code' => $product_code,
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $request->image,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
        ]);
        $product_data->save();
        if($product_data){
            return  redirect("admin/product")->with('thongbao','Lưu thanh cong');
        }else{
            return  redirect()->with('loi','Lưu không thành công');
        }
    }

    public function show($id)
    {
        $data = Product::findOrFail($id);
        return view('Admin/Product/show',compact('data'));
    }

    public function edit($id)
    {
        $data = Product::findOrFail($id);
        $brand = Brand::pluck('name','id')->toArray();
        $category = Category::pluck('name','id')->toArray();
        return view("Admin/Product/update",compact('data','brand','category'));
    }

    public function update(ProductValidate $request, $id)
    {
        $data = Product::findOrFail($id);
        if (!empty($request->hasFile('image'))){
            if($request->hasFile('image'))
            {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $duoi = $file->getClientOriginalExtension();
                if($duoi != 'jpg' && $duoi != 'png')
                {
                    return redirect('admin/product/create')->with('thongbao','Bạn chỉ được chọn file jpg,png');
                }
                $Hinh = str_random(4)."_".$name;
                while(file_exists("Upload/Product/".$Hinh))
                {
                    $Hinh = str_random(4)."_". $name;
                }
                $file->move("Upload/Product/",$Hinh);
                $request->image = $Hinh;
                if ($data){
                    $data->product_code = $data->product_code;
                    $data->product_name = $request->product_name;
                    $data->description = $request->description;
                    $data->price = $request->price;
                    $data->image = $request->image;
                    $data->brand_id = $request->brand_id;
                    $data->category_id = $request->category_id;
                    $data->updated_at = Carbon::now()->toDateTimeString();
                    $data->update();
                }else{
                    return back()->with("thongbao",'Cập nhật không thành công');
                }
            }else
            {
                $request->image = "";
            }
        }else{
            if ($data){
                $data->product_name = $request->product_name;
                $data->description = $request->description;
                $data->price = $request->price;
                $data->brand_id = $request->brand_id;
                $data->category_id = $request->category_id;
                $data->updated_at = Carbon::now()->toDateTimeString();
                $data->update();
            }else{
                return back()->with("thongbao",'Cập nhật không thành công');
            }
        }
        return  redirect("admin/product")->with('thongbao','Cập nhật thành công');
    }

    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        $result = OrderDetail::where('product_id', '=', $data->id)->get();
        if ($data && $result->count()==0){
            $filename = public_path().'/Upload/Product/'.$data->image;
            \File::delete($filename);
            $data->delete();
        }else{
            return redirect("admin/product")->with('thongbao','Dữ liệu đang được sử dụng bên Đơn hàng!');
        }
        return redirect("admin/product")->with('thongbao','Xóa thành công');
    }
}

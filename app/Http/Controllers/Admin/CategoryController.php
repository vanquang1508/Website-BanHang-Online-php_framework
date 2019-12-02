<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryValidate;
use App\Http\Requests\ValidateBrandCategory;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function index()
    {
        //
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view("Admin/Category/index",compact('categories'));
    }

    public function create()
    {
        return view("Admin/Category/create");
    }

    public function store(CategoryValidate $request)
    {
        //dd($request);
        //$request = $request->validated();
        $category_data = new Category([
            'name' => $request->name,
            'description' => $request->description
        ]);
        $category_data->save();
        if($category_data){
            return  redirect("admin/category")->with('thongbao','Lưu thành công');
        }else{
            return  back()->with('loi','Lưu không thành công');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Category::findOrFail($id);
        return view("Admin/Category/update",compact('data'));
    }

    public function update(CategoryValidate $request, $id)
    {
        //dd($request);
        $data = Category::findOrFail($id);
        if ($data){
            $data->name = $request->name;
            $data->description = $request->description;
            $data->updated_at = Carbon::now()->toDateTimeString();
            $data->update();
        }else{
            return back()->with("thongbao",'Cập nhật không thành công');
        }
        return  redirect("admin/category")->with('thongbao','Cập nhật thành công');
    }

    public function destroy($id)
    {
        $data = Category::findOrFail($id);
        $result = Product::where('category_id', '=', $data->id)->get();
        if ($data && $result->count()==0){
            $data->delete();
        }else{
            return redirect("admin/category")->with('thongbao','Dữ liệu đang được sử dụng bên sản phẩm!');
        }
        return redirect("admin/category")->with('thongbao','Xóa thành công');
    }
}

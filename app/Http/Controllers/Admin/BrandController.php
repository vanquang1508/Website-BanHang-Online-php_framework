<?php
namespace App\Http\Controllers\Admin;
use App\Http\Requests\BrandValidate;
use App\Http\Requests\ValidateBrandCategory;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Carbon\Carbon;
class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('created_at', 'desc')->get();
        return view("Admin/Brand/index",compact('brands'));
    }

    public function create()
    {
        return view("Admin/Brand/create");
    }

    public function store(BrandValidate $request)
    {
        //dd($request);
        $brand_data = new Brand([
            'name' => $request->name,
            'description' => $request->description
        ]);
        $brand_data->save();
        if($brand_data){
            return  redirect("admin/brand")->with('thongbao','Lưu thành công');
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
        $data = Brand::findOrFail($id);
        return view("Admin/Brand/update",compact('data'));
    }

    public function update(BrandValidate $request, $id)
    {
        //dd($request);
        //$request = $request->validated();
        $data = Brand::findOrFail($id);
        if ($data){
            $data->name = $request->name;
            $data->description = $request->description;
            $data->updated_at = Carbon::now()->toDateTimeString();
            $data->update();
        }else{
            return back()->with("thongbao",'Cập nhật thất bại');
        }
        return  redirect("admin/brand")->with('thongbao','Cập nhật thành công');

    }

    public function destroy($id)
    {
        $data = Brand::findOrFail($id);
        $result = Product::where('brand_id', '=', $data->id)->get();
        if ($data && $result->count()==0){
            $data->delete();
        }else{
            return redirect("admin/brand")->with('thongbao','Dữ liệu đang được sử dụng bên sản phẩm!');
        }
        return redirect("admin/brand")->with('thongbao','Xóa thành công');
    }
}

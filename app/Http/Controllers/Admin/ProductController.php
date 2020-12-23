<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Model\Product;
use App\Model\Bill_Detail;
use App\Model\Category;
use Illuminate\Support\Str;
use DB;

class ProductController extends Controller {

    //
    public function getProduct() {
        try {
            $data['prodList'] = DB::table('vp_products')
                    ->join('vp_categories', 'vp_products.prod_cate', '=', 'vp_categories.cate_id')
                    // ->orderBy('prod_id','desc')
                    ->get();
            $data['slg'] = Bill_Detail::select('product_id', DB::raw('sum(quantity) as quantity'))
                    ->groupBy('product_id')
                    ->get();
            return view('backend.product', $data);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getAddProduct() {
        try {
            $data['cateList'] = Category::all();
            return view('backend.addproduct', $data);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function postAddProduct(AddProductRequest $request) {
        try {
            $filename = $request->img->getClientOriginalName();
            $product = new Product;
            $product->prod_name = $request->name;
            $product->prod_slug = Str::slug($request->name, '-');
            $product->prod_img = $filename;
            $product->prod_accessories = $request->accessories;
            $product->prod_price = $request->price;
            $product->prod_ram = $request->ram;
            $product->prod_hardDrive = $request->hard;
            $product->prod_sale = $request->sale;
            $product->prod_warranty = $request->warranty;
            $product->prod_promotion = $request->promotion;
            $product->prod_condition = $request->condition;
            $product->prod_qty = $request->quality;
            $product->prod_description = $request->description;
            $product->prod_cate = $request->cate;
            $product->prod_func = $request->func;
            $product->prod_featured = $request->featured;
            $product->save();
            $request->img->storeAs('avatar', $filename);
            
            return back()->with('success', 'Thêm sản phẩm thành công');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getEditProduct($id) {
        try {
            $data['product'] = Product::find($id);
            $data1['category'] = Category::all();
            return view('backend.editproduct', $data, $data1);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function postEditProduct(EditProductRequest $request, $id) {
        try {
            $product = new Product;
            $arr['prod_name'] = $request->name;
            $arr['prod_slug'] = Str::slug($request->name);
            $arr['prod_accessories'] = $request->accessories;
            $arr['prod_price'] = $request->price;
            $arr['prod_ram'] = $request->ram;
            $arr['prod_hardDrive'] = $request->hard;
            $arr['prod_sale'] = $request->sale;
            $arr['prod_warranty'] = $request->warranty;
            $arr['prod_promotion'] = $request->promotion;
            $arr['prod_condition'] = $request->condition;
            $arr['prod_qty'] = $request->quality;
            $arr['prod_description'] = $request->description;
            $arr['prod_cate'] = $request->cate;
            $arr['prod_func'] = $request->func;
            $arr['prod_featured'] = $request->featured;
            if ($request->hasFile('img')) {
                $img = $request->img->getClientOriginalName();
                $arr['prod_img'] = $img;
                $request->img->storeAs('avatar', $img);
            }
            $product::where('prod_id', $id)->update($arr);
            return back()->with('success', 'Chỉnh sửa sản phẩm ID = ' . $id . ' thành công');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getDeleteProduct($id) {
        try {
            Product::destroy($id);
            return back()->with('success', 'Xóa sản phẩm ID = ' . $id . ' thành công');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

}

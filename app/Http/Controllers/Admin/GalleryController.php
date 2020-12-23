<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Gallery;

class GalleryController extends Controller {

    public function getGallery() {
        try {
            $data['gallery'] = Gallery::join('vp_products', 'vp_products.prod_id', '=', 'vp_galleries.product_id')
                    ->select('vp_products.*', 'vp_galleries.*')
                    ->get();
            $data['product'] = Product::all();
            return view('backend.gallery', $data);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function postGallery(Request $request) {
        try {
            if ($request->submit == "Thêm") {
                if ($request->hasFile('img')) 
                    $filename = $request->img->getClientOriginalName();
                else
                    return back()->with('error', 'Hãy chọn file ảnh trước khi thêm mới!');
                $gallery = new Gallery;
                $gallery->image = $filename;
                $gallery->product_id = $request->name;
                $gallery->save();
                $request->img->storeAs('avatar', $filename);
                return back()->with('success', 'Thêm ảnh thành công!');
            }
            $gallery = new Gallery;
            $arr['product_id'] = $request->name;
            if ($request->hasFile('img')) {
                $img = $request->img->getClientOriginalName();
                $arr['image'] = $img;
                $request->img->storeAs('avatar', $img);
            }
            else
                return back()->with('error', 'Hãy chọn file ảnh trước khi chỉnh sửa!');
            $gallery::where('id', $request->id)->update($arr);
            return back()->with('success', 'Thay ảnh ID = ' . $request->id . 'thành công!');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getDeleteGallery($id) {
        try {
            Gallery::destroy($id);
            return back()->with('success', 'Xóa ảnh thành công ID = ' . $id);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

}

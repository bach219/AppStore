<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller {

    //
    public function getCategory() {
        try {
            $data['cateList'] = Category::all();
            return view('backend.category', $data);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getAddCategory() {
        return view('backend.addcategory');
    }

    public function postAddCategory(AddCategoryRequest $request) {
        try {
            $filename = $request->img->getClientOriginalName();
            $category = new Category;
            $category->cate_name = $request->name;
            $category->cate_image = $filename;
            $category->cate_slug = Str::slug($request->name, '-');
            $category->cate_present = $request->content;
            $category->save();
            $request->img->storeAs('avatarCategory', $filename);
            return back()->with('success', 'Thêm thương hiệu ' . $request->name . ' thành công');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getEditCategory($id) {
        try {
            $data['cate'] = Category::find($id);
            return view('backend.editcategory', $data);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function postEditCategory(EditCategoryRequest $request, $id) {
        try {
            $category = Category::find($id);
            $category->cate_name = $request->name;
            $category->cate_slug = Str::slug($request->name, '-');
            $category->cate_present = $request->content;
            if ($request->hasFile('img')) {
                $img = $request->img->getClientOriginalName();
                $category->cate_image = $img;
                $request->img->storeAs('avatarCategory', $img);
            }
            $category->save();
            return back()->with('success', 'Chỉnh sửa thương hiệu ' . $request->name . ' thành công');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getDeleteCategory($id) {
        try {
            Category::destroy($id);
            return back()->with('success', 'Xóa thương hiệu ID = ' . $id . ' thành công');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

}

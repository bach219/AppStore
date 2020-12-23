<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Functionality;
use App\Http\Requests\AddFunctionalityRequest;
use Illuminate\Support\Str;

class FunctionalityController extends Controller
{
    // function getAddFunctionality(AddFunctionalityRequest $request){
    //     try {
    //         $function = new Functionality;
    //         $function->func_name = $request->name;
    //         $function->func_slug = Str::slug($request->name, '-');
    //         $function->save();
    //         return back()->with('success', 'Thêm danh mục ' . $request->name . ' thành công');
    //     } catch (ModelNotFoundException $e) {
    //         echo $e->getMessage();
    //     }
    // }

    public function postFunctionality(Request $request) {
        try {
            if ($request->submit == "Thêm") {
                $function = new Functionality;
                $function->func_name = $request->nameFunc;
                $function->func_slug = Str::slug($request->nameFunc, '-');
                $function->save();
                return back()->with('success', 'Thêm danh mục '. $request->nameFunc.' thành công!');
            }
            $function = new Functionality;
            $arr['func_name'] = $request->nameFunc;
            $arr['func_slug'] = Str::slug($request->nameFunc, '-');
            $function::where('func_id', $request->id)->update($arr);
            return back()->with('success', 'Thay danh mục ID = ' . $request->id . ' thành công!');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getDeleteFunctionality($id){
        try {
            Functionality::destroy($id);
            return back()->with('success', 'Xóa danh mục ID = ' . $id . ' thành công');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }
}
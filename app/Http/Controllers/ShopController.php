<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;

class ShopController extends Controller
{
    public function getShop($func_id, Request $request) {
        try {
            $id = $func_id;
            $hang = array();
            $ramGB = array();
            $hardGB = array();
            $gia = array();
            $sx = array();
            $Products = Product::where([['prod_qty', '>', 0],['prod_func', '=', $func_id]])->paginate(12);
            if ($request->price) {

                $price = $request->price; //brand
                $gia = $request->price;
                if ($price == '1')
                    $Products = Product::where([['prod_qty', '>', 0],['prod_func', '=', $func_id]])->whereBetween('prod_price', [0, 2000000])->paginate(120);
                if ($price == '2')
                    $Products = Product::where([['prod_qty', '>', 0],['prod_func', '=', $func_id]])->whereBetween('prod_price', [2000001, 4000000])->paginate(120);
                if ($price == '3')
                    $Products = Product::where([['prod_qty', '>', 0],['prod_func', '=', $func_id]])->whereBetween('prod_price', [4000001, 7000000])->paginate(120);
                if ($price == '4')
                    $Products = Product::where([['prod_qty', '>', 0],['prod_func', '=', $func_id]])->whereBetween('prod_price', [7000001, 13000000])->paginate(120);
                if ($price == '5')
                    $Products = Product::where([['prod_qty', '>', 0],['prod_func', '=', $func_id]])->whereBetween('prod_price', [13000001, 100000000])->paginate(120);
                response()->json($Products); //return to ajax
            }
            if ($request->category) {

                $category = $request->category; //brand
                $arr = explode(',', $category);
                foreach ($arr as $val)
                    array_push($hang, $val);
                $Products = Product::where([['prod_qty', '>', 0],['prod_func', '=', $func_id]])->whereIn('prod_cate', explode(',', $category))->paginate(120);
                response()->json($Products); //return to ajax
            }
            if ($request->ram) {

                $ram = $request->ram; //brand
                $arr = explode(',', $ram);
                foreach ($arr as $val)
                    array_push($ramGB, $val);
                $Products = Product::where([['prod_qty', '>', 0],['prod_func', '=', $func_id]])->whereIn('prod_ram', explode(',', $ram))->paginate(120);

                response()->json($Products); //return to ajax
            }
            if ($request->hard) {

                $hard = $request->hard; //brand
                $arr = explode(',', $hard);
                foreach ($arr as $val)
                    array_push($hardGB, $val);
                $Products = Product::where([['prod_qty', '>', 0],['prod_func', '=', $func_id]])->whereIn('prod_hardDrive', explode(',', $hard))->paginate(120);

                response()->json($Products); //return to ajax
            }
            if ($request->sort) {
                $sx = $request->sort;
                $sort = $request->sort; //brand
                if ($sort == '1')
                    $Products = Product::where([['prod_qty', '>', 0],['prod_func', '=', $func_id]])->where('prod_sale', '>', 0)->orderBy('prod_sale', 'desc')->paginate(120);
                if ($sort == '3')
                    $Products = Product::where([['prod_qty', '>', 0],['prod_func', '=', $func_id]])->orderByRaw('prod_price *(1-prod_sale/100) asc')->paginate(120);
                if ($sort == '2')
                    $Products = Product::where([['prod_qty', '>', 0],['prod_func', '=', $func_id]])->orderByRaw('prod_price *(1-prod_sale/100) desc')->paginate(120);
                response()->json($Products); //return to ajax
            }
            $RAM = Product::where([['prod_qty', '>', 0],['prod_func', '=', $func_id]])->select('prod_ram')->groupBy('prod_ram')->get();
            $HARD = Product::where([['prod_qty', '>', 0],['prod_func', '=', $func_id]])->select('prod_hardDrive')->groupBy('prod_hardDrive')->get();

            return view('frontend.shop')->with(compact('Products', 'RAM', 'HARD', 'hang', 'sx', 'ramGB', 'gia', 'hardGB', 'id'));
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }
}

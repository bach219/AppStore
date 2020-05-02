<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Cart;
use App\Model\Comment;
use App\Model\Contact;
use App\Model\Product;
use App\Model\Category;
use App\Model\Bill;
use App\Model\Bill_Detail;
use App\Client;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {

    //
    public function getHome() {
        try {
            $data['earning'] = Bill_Detail::select(DB::raw('SUM(price * quantity) as total_sales'))->get();
            $data['quantity'] = Bill_Detail::select(DB::raw('SUM(quantity) as quantity'))->get();
            $data['comment'] = Comment::count();
            $data['client'] = Client::count();
            $data['chart1'] = Product::join('vp_categories', 'vp_products.prod_cate', '=', 'vp_categories.cate_id')
                    ->join('vp_bill_details', 'vp_products.prod_id', '=', 'vp_bill_details.product_id')
                    ->select('vp_categories.cate_name', DB::raw('sum(vp_bill_details.quantity) as quantity'), DB::raw('sum(vp_bill_details.quantity * vp_bill_details.price) as earning'))
                    ->groupBy('vp_categories.cate_name')
                    ->get();
            $data['chart2'] = Product::join('vp_categories', 'vp_products.prod_cate', '=', 'vp_categories.cate_id')
                    ->join('vp_comment', 'vp_products.prod_id', '=', 'vp_comment.com_product')
                    ->select('vp_categories.cate_name', DB::raw('count(vp_comment.com_id) as rate'))
                    ->groupBy('vp_categories.cate_name')
                    ->get();
            $data['sum'] = Comment::count();
            return view('backend.index', $data);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }


    public function getLogout() {
        try {
            Auth::logout();
            return redirect('login');
            //return view('backend.login');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

}

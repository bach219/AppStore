<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterFormRequest;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Response;
use App\Client;
use App\Http\Requests\RegisterClientRequest;
use App\Http\Requests\LoginClientRequest;
use Illuminate\Support\Facades\Hash;
use Config;
use JWTAuthException;
use App\Model\Product;
use App\Model\Category;
use App\Model\Comment;
use App\Model\Bill;
use App\Model\Functionality;
use Illuminate\Support\Facades\DB;
class ApiController extends Controller
{
    public function register(RegisterClientRequest $request)
    {
        if ($request['password'] != $request['passwordVerify']) {
                return response()->json('error', 400);
            }
                $client = Client::create([
                            'name' => $request['name'],
                            'email' => $request['email'],
                            'password' => Hash::make($request['password']),
                            'phone' => $request['phone'],
                            'address' => $request['address'],
                            'sex' => $request['sex']
                ]);
        
        return response()->json([
            'client' => $client
        ], 200);
    }

    public function login(LoginClientRequest $request)
    {
        $credentials = ['email' => $request['email'], 'password' => $request['password']];
        if (!($token = auth('api')->attempt($credentials))) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 400);
        }
        
        
        return response()->json([
            'token' => $token,
            'client' => auth('api')->user(),
            'expired' => auth('api')->factory()->getTTL() * 3600 * 1000 * 24 * 7
        ], 200);
    }

    public function client(Request $request)
    {
        $client = auth('api')->user();

        if ($client) {
            return response($client, 200);
        }

        return response(null, 400);
    }

    /**
     * Log out
     * Invalidate the token, so user cannot use it anymore
     * They have to relogin to get a new token
     *
     * @param Request $request
     */
    public function logout(Request $request) {
        
        //  $this->validate($request, ['token' => 'required']);
        
        try {
            auth('api')->invalidate();
            return response()->json('You have successfully logged out.', 200);
        } catch (JWTException $e) {
            return response()->json('Failed to logout, please try again.', 400);
        }
    }

    public function refresh()
    {
        return response(JWTAuth::getToken(), 200);
    }
    public function productList(Request $request){
        $Products = Product::join('vp_categories', 'vp_products.prod_cate', '=', 'vp_categories.cate_id')
                    ->select('vp_products.prod_id', 'vp_products.prod_name', 'vp_products.prod_img', 'vp_products.prod_qty', 'vp_categories.cate_name', 'vp_products.created_at', 'vp_products.prod_sale', 'vp_products.prod_price')
                    ->latest()->get();
        return response()->json($Products, 200);
    }
    public function listProductNew(Request $request){
        $Products = Product::join('vp_categories', 'vp_products.prod_cate', '=', 'vp_categories.cate_id')
                    ->select('vp_products.prod_id', 'vp_products.prod_name', 'vp_products.prod_img', 'vp_products.prod_qty', 'vp_categories.cate_name', 'vp_products.created_at', 'vp_products.prod_sale', 'vp_products.prod_price')
                    ->latest()->take(6)->get();
        return response()->json($Products, 200);
    }

    public function listProductBestSelling(Request $request){
        $Products = Product::join('vp_bill_details', 'vp_products.prod_id', '=', 'vp_bill_details.product_id')
                    ->join('vp_categories', 'vp_products.prod_cate', '=', 'vp_categories.cate_id')
                    ->select('product_id', 'vp_products.prod_price', DB::raw('sum(quantity) as quantity'), 'vp_products.prod_name', 'vp_products.prod_img', 'vp_products.prod_qty', 'vp_categories.cate_name', 'vp_products.prod_sale')
                    ->groupBy('product_id', 'vp_products.prod_price', 'vp_products.prod_name', 'vp_products.prod_img', 'vp_products.prod_qty', 'vp_categories.cate_name', 'vp_products.prod_sale')
                    ->orderBy('quantity', 'desc')
                    ->take(6)
                    ->get();
        return response()->json($Products, 200);
    }

    public function bestSellProduct(Request $request){
        $Products = Product::join('vp_bill_details', 'vp_products.prod_id', '=', 'vp_bill_details.product_id')
                    ->join('vp_categories', 'vp_products.prod_cate', '=', 'vp_categories.cate_id')
                    ->select('vp_products.prod_id', 'vp_categories.cate_name', 'vp_products.prod_price', DB::raw('sum(quantity * price) as quantity'), 'vp_products.prod_name', 'vp_products.prod_img', 'vp_products.prod_qty', 'vp_products.created_at', 'vp_products.prod_sale')
                    ->groupBy('vp_products.prod_id', 'vp_categories.cate_name', 'vp_products.prod_price', 'vp_products.prod_name', 'vp_products.prod_img', 'vp_products.prod_qty', 'vp_products.created_at', 'vp_products.prod_sale')
                    ->orderBy('quantity', 'desc')
                    ->take(1)
                    ->get();
        return response()->json($Products, 200);
    }

    public function bestExpensiveProduct(Request $request){
        $Products = Product::join('vp_categories', 'vp_products.prod_cate', '=', 'vp_categories.cate_id')
                    ->select('vp_products.prod_id', 'vp_products.prod_price', 'vp_products.prod_name', 'vp_products.prod_img', 'vp_products.prod_qty', 'vp_products.prod_sale', 'vp_categories.cate_name')
                    ->orderBy('prod_price', 'desc')
                    ->take(1)
                    ->get();
        return response()->json($Products, 200);
    }


    public function getCategory(Request $request){
        $Category = Category::select('cate_id','cate_name','cate_image')->get();
        return response()->json($Category, 200);
    }

    public function getFunctionality(Request $request){
        $Functionality = Functionality::select('func_id','func_name')->get();
        return response()->json($Functionality, 200);
    }

    public function getSearch(Request $request) {
        try {
            $search = $request->search;
            $Product = Product::join('vp_categories', 'vp_products.prod_cate', '=', 'vp_categories.cate_id')
                    ->select('vp_products.prod_id', 'vp_products.prod_price', 'vp_products.prod_name', 'vp_products.prod_img', 'vp_products.prod_qty', 'vp_products.prod_sale', 'vp_categories.cate_name')
                    ->where('prod_name', 'like', '%' . $search . '%')
                    ->orWhere('vp_categories.cate_name', 'like', '%' . $search . '%')
                    ->get();
            return response()->json($Product, 200);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }
    

    public function getImage(Request $request) {
        try {
            $id = $request->id;
            $Image = Product::join('vp_galleries', 'vp_products.prod_id', '=', 'vp_galleries.product_id')
                    ->select('vp_galleries.product_id', 'vp_galleries.image')
                    ->where('product_id', '=', $id)
                    ->get();
            return response()->json($Image, 200);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getComment(Request $request) {
        try {
            $id = $request->id;
            $Comment = Product::join('vp_comment', 'vp_products.prod_id', '=', 'vp_comment.com_product')
                    ->select('vp_comment.*')
                    ->where('com_product', '=', $id)
                    ->get();
            return response()->json($Comment, 200);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }
    public function getDetailProduct(Request $request) {
        try {
            $id = $request->id;
            $Product = Product::join('vp_categories', 'vp_products.prod_cate', '=', 'vp_categories.cate_id')
                    ->select('vp_products.*', 'vp_categories.cate_name')
                    ->where('prod_id', '=', $id)
                    ->get();
            return response()->json($Product, 200);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getMore(Request $request) {
        try {
            $id = $request->id;
            $Product = Product::join('vp_categories', 'vp_products.prod_cate', '=', 'vp_categories.cate_id')
                    ->select('vp_products.prod_id', 'vp_products.prod_price', 'vp_products.prod_name', 'vp_products.prod_img', 'vp_products.prod_qty', 'vp_products.prod_sale', 'vp_categories.cate_name')
                    ->where('prod_cate', '=', $id)
                    ->get();
            return response()->json($Product, 200);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

}

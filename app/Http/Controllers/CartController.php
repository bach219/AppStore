<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Auth;
use App\Model\Product;
use App\Model\Bill;
use App\Model\Bill_Detail;
use App\Model\Customer;
use App\Http\Requests\ShoppingCartRequest;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller {

    //
    public function getAddCart($id) {
        try {
            $product = Product::find($id);
            $cartInfor = Cart::content();
            Cart::add(['id' => $id, 'name' => $product->prod_name, 'qty' => 1, 'price' => $product->prod_price * (1 - $product->prod_sale / 100), 'options' => ['img' => $product->prod_img, 'quality' => $product->prod_qty, 'sale' => $product->prod_sale]]);

            if (count($cartInfor) > 0) {
                foreach ($cartInfor as $key => $item) {
                    if ($item->id == $id) {
                        if ($item->qty > $product->prod_qty) {
                            Cart::update($item->rowId, $item->options->quality - 1);
                            // return redirect('cart/show')->with('alert', 'Giới hạn '.$product->prod_qty.' sản phẩm!');
                            return redirect('cart/show')->with(['alert' => 'Giới hạn ' . $product->prod_qty . ' sản phẩm!', 'id' => $id]);
                        }
                    }
                }
            }
            return redirect('cart/show');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getShowCart() {
        try {
            $data['product'] = Cart::content();
            $data['total'] = Cart::total();
            return view('frontend.cart', $data);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getDeleteCart($id) {
        try {
            if ($id == 'all')
                Cart::destroy();
            else
                Cart::remove($id);
            return back();
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getUpdateCart(Request $request) {
        try {
            if ($request->qty <= $request->slg - 1 && $request->qty <= 5)
                Cart::update($request->rowId, $request->qty);
            else if($request->qty > 5){
                Cart::update($request->rowId, 5);
                return redirect('cart/show')->with('error', 'Giới hạn '.$request->name.' mua 5 sản phẩm!');
            }
            else {
                return redirect('cart/show')->with('error', 'Giới hạn '.$request->name.' mua '. $request->slg . ' sản phẩm!');
            }
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getCheckout(Request $request) {
        try {
            $data1['product'] = Cart::content();
            $data1['total'] = Cart::total();
            return view('frontend.checkout', $data1);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function postCheckout(ShoppingCartRequest $request) {
        try {
            $cartInfor = Cart::content();
            
            $customer = new Customer;
            $customer->name = $request->name;
            $customer->sex = $request->sex;
            $customer->con_email = $request->email;
            $customer->address = $request->address;
            $customer->phone_number = $request->phone;
            if (Auth::guard('clients')->user())
                $customer->client_id = Auth::guard('clients')->user()->id;
            $customer->save();

            $bill = new Bill;
            $bill->customer_id = $customer->id;
            $bill->date_order = $customer->created_at;
            $bill->total = str_replace(',', '', Cart::total());
            $bill->note = $request->note;
            $bill->method = $request->method;
            $bill->save();

            if (count($cartInfor) > 0) {
                foreach ($cartInfor as $key => $item) {
                    $billDetail = new Bill_Detail;
                    $billDetail->bill_id = $bill->id;
                    $billDetail->product_id = $item->id;
                    $billDetail->quantity = $item->qty;
                    $billDetail->price = $item->price;
                    $billDetail->save();
                }
            }
            // del
            Cart::destroy();
            //    return redirect()->intended('cart/complete');
            return view('frontend.complete');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getComplete() {
        return view('frontend.complete');
    }

}

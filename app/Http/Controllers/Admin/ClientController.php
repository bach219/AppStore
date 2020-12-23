<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Customer;
use App\Model\Bill;
use App\Model\Bill_Detail;
use App\Model\Product;
use App\Model\Contact;
use App\Client;
use Auth;

class ClientController extends Controller {

    public function getClient() {
        try {
            $data['clients'] = Client::all();
            return view('backend.client', $data);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getEditClient($id) {
        try {
            $data['client'] = Client::find($id);
            $data['product'] = Product::all();
            $data['id'] = $id;
            $data['listBill'] = Bill::join('vp_customers', 'vp_bills.customer_id', '=', 'vp_customers.id')
                    ->join('vp_bill_details', 'vp_bills.id', '=', 'vp_bill_details.bill_id')
                    ->select('vp_bills.*', 'vp_customers.client_id')
                    ->distinct()
                    ->get();

            return view('backend.editclient', $data);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getDeleteClient($id) {
        try {
            Client::destroy($id);
            return back()->with('success', 'Xóa khách hàng ID = ' . $id . ' thành công ');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getDetailClient($idClient, $id) {
        try {
            $data['client'] = Client::find($id);
            $data['product'] = Product::all();
            $data['id'] = $id;
            $data['idClient'] = $idClient;
            // $data['listBill'] = Bill_Detail::join('vp_products', 'vp_bill_details.product_id', '=', 'vp_products.prod_id')
            //                         ->select('vp_products.*', 'vp_bill_details.bill_id', 'vp_bill_details.quantity')
            //                         ->where('vp_bill_details.bill_id',$id)
            //                         ->get();
            $data['listBill'] = DB::table('vp_bills')
                    ->join('vp_customers', 'vp_bills.customer_id', '=', 'vp_customers.id')
                    ->join('vp_bill_details', 'vp_bills.id', '=', 'vp_bill_details.bill_id')
                    ->select('vp_bills.*', 'vp_bill_details.*', 'vp_customers.*')
                    ->get();
            return view('backend.detailbill', $data);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getDeleteBill($id) {
        try {
            Bill::destroy($id);
            return back()->with('success', 'Xóa hóa đơn mua hàng ID = ' . $id . ' thành công!');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getDeleteDetailBill($id) {
        try {
            Bill_Detail::destroy($id);
            return back()->with('success', 'Xóa sản phẩm trong hóa đơn mua hàng ID = ' . $id . ' thành công!');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

}

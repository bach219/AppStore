<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Model\Customer;
use App\Model\Bill;
use App\Model\Bill_Detail;
use App\Model\Product;
use App\Model\Contact;
use App\Model\Sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use Auth;

class CustomerController extends Controller {

    public function getCustomer() {
        try {
            $data['cusList'] = Customer::join('vp_bills', 'vp_customers.id', '=', 'vp_bills.customer_id')
                                        ->select('vp_customers.*','vp_bills.bill_check')
                                        ->get();
            return view('backend.customer', $data);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }
    
    public function getVerify($id) {
        try {
            $bill = new Bill;
            $sale = new Sale;

            $arr['bill_check'] = 1;
            $bill::where('id', $id)->update($arr);

            $sale->user_id = Auth::user()->id;
            $sale->bill_id = $id;
            $sale->save();

            return back()->with('success', 'Xác nhận đơn hàng ID = ' . $id . ' thành công');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getEditCustomer($id) {
        try {
            $data['customer'] = Customer::join('vp_bills', 'vp_customers.id', '=', 'vp_bills.customer_id')
                                    ->select('vp_customers.*','vp_bills.id','vp_bills.bill_check','vp_bills.note','vp_bills.created_at as created')
                                    ->where('vp_customers.id', '=', $id)
                                    ->get();
            $data['product'] = Product::all();
            $data['id'] = $id;
            // $data['bill_id'] = Bill::join('vp_bill_details', 'vp_bills.id', '=', 'vp_bill_details.bill_id' )
            //                         ->select('vp_bills.id','vp_bills.customer_id')
            //                         ->where('vp_bills.customer_id', '=', $id)
            //                         ->get();
            // $data['listBill'] = DB::table('vp_bills')
            //     ->join('vp_customers', 'vp_bills.customer_id', '=', 'vp_customers.id', )
            //     ->join('vp_bill_details', 'vp_bills.id', '=', 'vp_bill_details.bill_id' )
            //     ->select('vp_bills.*', 'vp_bill_details.*')
            //     ->get();
            $data['listBill'] = Bill::join('vp_bill_details', 'vp_bills.id', '=', 'vp_bill_details.bill_id')
                    ->select('vp_bills.*', 'vp_bill_details.*')
                    ->where('vp_bills.customer_id', '=', $id)
                    ->get();
            return view('backend.editcustomer', $data);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getDeleteCustomer($id) {
        try {
            Customer::destroy($id);
            return back()->with('success', 'Xóa thông tin người mua hàng ID = ' . $id . ' thành công');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

}

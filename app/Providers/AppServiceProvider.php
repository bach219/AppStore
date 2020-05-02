<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\Category;
use App\Model\Contact;
use App\Model\Product;
use App\Model\Bill_Detail;
use App\Model\Bill;
use App\Model\Customer;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $data['checkBill'] = Bill_Detail::join('vp_bills', 'vp_bills.id', '=', 'vp_bill_details.bill_id')
                                          ->join('vp_products', 'vp_products.prod_id', '=', 'vp_bill_details.product_id')
                                          ->select('vp_bills.id', 'vp_bill_details.*','vp_products.prod_name','vp_products.prod_img', 'vp_bills.bill_check', 'vp_bills.customer_id')
                                          ->where('vp_bills.bill_check',0)
                                          ->orderBy('vp_bills.id','desc')
                                          ->take(6)
                                          ->get();
        $data['countCheckBill'] = Bill::join('vp_bill_details', 'vp_bills.id', '=', 'vp_bill_details.bill_id')
                                          ->select('vp_bills.bill_check')
                                          ->where('vp_bills.bill_check',0)
                                          ->count();
        $data['product'] = Product::all();
        $data['customer'] = Customer::all();
        $data['checkProduct'] = Product::where('prod_qty','<=',5)->take(6)->get();
        $data['countCheckProduct'] = Product::where('prod_qty','<=',5)->count();
        $data['checkMail'] = Contact::where('con_check',0)->take(6)->get();
        $data['countCheckMail'] = Contact::where('con_check',0)->count();
        $data['categories'] = Category::all();
        view()->share($data);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

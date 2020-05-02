<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Category;
use App\Model\Comment;
use App\Model\Contact;
use App\Model\Customer;
use App\Model\Bill;
use App\Model\Bill_Detail;
use App\Model\Gallery;
use App\Client;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\CheckCommentRequest;
use App\Http\Requests\CheckOutRequest;
use App\Http\Requests\LoginClientRequest;
use App\Http\Requests\AddCommentRequest;
use App\Http\Requests\RegisterClientRequest;
use App\Http\Requests\ShoppingCartRequest;
use Auth;

class FrontendController extends Controller {

    //
    public function getHome() {
        try {
            $data['newList'] = Product::where('prod_qty', '>', 0)->orderBy('prod_id', 'desc')
                    ->take(12)
                    ->get();
            $data['categories'] = Category::skip(0)->take(6)->get();
            $data['sale'] = Product::where('prod_sale','>','0')->orderBy('prod_sale','desc')->skip(1)->take(6)->get();
            $data['best'] = Product::where('prod_sale','>','0')->orderBy('prod_sale','desc')->skip(0)->take(1)->get();
            return view('frontend.home', $data);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getAccount() {
        try {
            $data['client'] = Client::all();
            $data['product'] = Product::all();
            $data['listBill'] = Bill::join('vp_customers', 'vp_bills.customer_id', '=', 'vp_customers.id')
                    ->join('vp_bill_details', 'vp_bills.id', '=', 'vp_bill_details.bill_id')
                    ->select('vp_bills.*', 'vp_bill_details.*', 'vp_customers.*')
                    ->get();
            return view('frontend.account', $data);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function postAccount(RegisterRequest $request, $id) {
        try {
            $client = new Client;
            $arr['name'] = $request->name;
            if ($request->change == 1)
                $arr['password'] = Hash::make($request->password);
            $arr['email'] = $request->email;
            $arr['phone'] = $request->phone;
            $arr['address'] = $request->address;
            $arr['sex'] = $request->sex;

            if ($request->hasFile('img')) {
                $img = $request->img->getClientOriginalName();
                $arr['image'] = $img;
                $request->img->storeAs('avatarClient', $img);
            }
            $client::where('id', Auth::guard('clients')->user()->id)->update($arr);
            return back()->with('success', 'Chỉnh sửa thông tin cá nhân thành công');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getShop(Request $request) {
        try {
            $hang = array();
            $ramGB = array();
            $hardGB = array();
            $gia = array();
            $sx = '';
            $Products = Product::where('prod_qty', '>', 0)->paginate(12);
            if ($request->price) {

                $price = $request->price; //brand
                $gia = $request->price;
                if ($price == '1')
                    $Products = Product::where('prod_qty', '>', 0)->whereBetween('prod_price', [0, 2000000])->paginate(120);
                if ($price == '2')
                    $Products = Product::where('prod_qty', '>', 0)->whereBetween('prod_price', [2000001, 4000000])->paginate(120);
                if ($price == '3')
                    $Products = Product::where('prod_qty', '>', 0)->whereBetween('prod_price', [4000001, 7000000])->paginate(120);
                if ($price == '4')
                    $Products = Product::where('prod_qty', '>', 0)->whereBetween('prod_price', [7000001, 13000000])->paginate(120);
                if ($price == '5')
                    $Products = Product::where('prod_qty', '>', 0)->whereBetween('prod_price', [13000001, 100000000])->paginate(120);
                response()->json($Products); //return to ajax
            }
            if ($request->category) {

                $category = $request->category; //brand
                $arr = explode(',', $category);
                foreach ($arr as $val)
                    array_push($hang, $val);
                $Products = Product::where('prod_qty', '>', 0)->whereIn('prod_cate', explode(',', $category))->paginate(120);
                response()->json($Products); //return to ajax
            }
            if ($request->ram) {

                $ram = $request->ram; //brand
                $arr = explode(',', $ram);
                foreach ($arr as $val)
                    array_push($ramGB, $val);
                $Products = Product::where('prod_qty', '>', 0)->whereIn('prod_ram', explode(',', $ram))->paginate(120);

                response()->json($Products); //return to ajax
            }
            if ($request->hard) {

                $hard = $request->hard; //brand
                $arr = explode(',', $hard);
                foreach ($arr as $val)
                    array_push($hardGB, $val);
                $Products = Product::where('prod_qty', '>', 0)->whereIn('prod_hardDrive', explode(',', $hard))->paginate(120);

                response()->json($Products); //return to ajax
            }
            if ($request->sort) {
                $sx = $request->sort;
                $sort = $request->sort; //brand
                if ($sort == '1')
                    $Products = Product::where('prod_qty', '>', 0)->where('prod_sale', '>', 0)->orderBy('prod_sale', 'desc')->paginate(120);
                if ($sort == '3')
                    $Products = Product::where('prod_qty', '>', 0)->orderByRaw('prod_price *(1-prod_sale/100) asc')->paginate(120);
                if ($sort == '2')
                    $Products = Product::where('prod_qty', '>', 0)->orderByRaw('prod_price *(1-prod_sale/100) desc')->paginate(120);
                response()->json($Products); //return to ajax
            }
            $RAM = Product::where('prod_qty', '>', 0)->select('prod_ram')->groupBy('prod_ram')->get();
            $HARD = Product::where('prod_qty', '>', 0)->select('prod_hardDrive')->groupBy('prod_hardDrive')->get();

            return view('frontend.shop')->with(compact('Products', 'RAM', 'HARD', 'hang', 'sx', 'ramGB', 'gia', 'hardGB'));
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getContact() {
        return view('frontend.contact');
    }

    public function postContact(Request $request) {
        try {
            $con = new Contact;
            $con->con_email = $request->email;
            $con->con_name = $request->name;
            $con->sex = $request->sex;
            $con->con_message = $request->mess;
            if(Auth::guard('clients')->user()){
                $con->con_img = Auth::guard('clients')->user()->image;
            }
                
            $con->save();
            return back()->with('success', 'Liên hệ thành công');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getBlog() {
        return view('frontend.blog');
    }

    public function getAbout() {
        return view('frontend.about');
    }

    public function getDetail($id) {
        try {
            $data['id'] = $id;
            $data['images'] = Product::join('vp_galleries', 'vp_products.prod_id', '=', 'vp_galleries.product_id')
                    ->select('prod_id', 'image')
                    ->where('prod_id', $id)
                    ->get();
            $data['countImg'] = Gallery::where('product_id', $id)->count();
            $data['detail'] = Product::find($id);
            $data['comments'] = Comment::where('com_product', $id)->get();
            $data['count'] = Comment::where([
                        ['com_product', '=', $id],
                        ['com_check', '=', 1]
                    ])->count();
            $data['quality'] = Bill_Detail::select('product_id', DB::raw('sum(quantity) as quantity'))
                    ->groupBy('product_id')
                    ->get();
            $data['category'] = Product::join('vp_categories', 'prod_cate', '=', 'cate_id')
                    ->select('prod_id', 'cate_present', 'cate_name')
                    ->where('prod_id', $id)
                    ->get();
            return view('frontend.details', $data);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getCategory($id) {
        try {
            $data['products'] = Product::where('prod_cate', $id)
                    ->orderBy('prod_id', 'desc')
                    ->paginate(12);
            $data['category'] = Category::find($id);
            return view('frontend.category', $data);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function postComment(AddCommentRequest $request, $id) {
        try {
            $com = new Comment;
            if (Auth::guard('clients')->user()) {
                $filename = Auth::guard('clients')->user()->image;
                $com->com_image = $filename;
            }
            $com->com_name = $request->name;
            $com->com_email = $request->email;
            $com->com_content = $request->content;
            $com->com_product = $id;
            $com->save();
            return back()->with('success', 'Bình luận thành công! Chúng tôi sẽ kiểm duyệt nội dung này');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getSearch(Request $request) {
        try {
            $result = $request->result;
            $result = str_replace(' ', '%', $result);
            $data['product'] = Product::where('prod_name', 'like', '%' . $result . '%')
                    ->join('vp_categories', 'vp_products.prod_cate', '=', 'vp_categories.cate_id')
                    ->orWhere('vp_categories.cate_name', 'like', '%' . $result . '%')
                    ->paginate(12);

            $data['search'] = $result;
            $data['quality'] = Product::where('prod_name', 'like', '%' . $result . '%')
                    ->join('vp_categories', 'vp_products.prod_cate', '=', 'vp_categories.cate_id')
                    ->orWhere('vp_categories.cate_name', 'like', '%' . $result . '%')
                    ->count();
            $data['product']->setPath('../../search?result=' . $result);
            return view('frontend.search', $data);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getLogin() {
        return view('frontend.login');
    }

    public function clientLogin(LoginClientRequest $request) {
        try {
            $arr = ['email' => $request->email, 'password' => $request->password];
            if (Auth::guard('clients')->attempt($arr, true)) {
                return redirect('account/' . Auth::guard('clients')->user()->id);
            }
            return back()->with('error', 'Tài khoản hoặc mật khẩu chưa đúng');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function outLogin(Request $request) {
        try {
            Auth::guard('clients')->logout();
            $request->session()->flush();
            $request->session()->regenerate();
            return redirect()->guest('/');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getRegister() {
        return view('frontend.register');
    }

    public function postRegister(RegisterClientRequest $request) {
        if ($request['password'] != $request['passwordVerify'])
            return back()->with('error', 'Yêu cầu xác minh lại mật khẩu chưa đúng');
        else {

            try {
                $client = Client::create([
                            'name' => $request['name'],
                            'email' => $request['email'],
                            'password' => Hash::make($request['password']),
                            'phone' => $request['phone'],
                            'address' => $request['address'],
                            'sex' => $request['sex']
                ]);
                return redirect()->intended('clientLogin');
            } catch (ModelNotFoundException $e) {
                echo $e->getMessage();
            }
        }
    }

    public function getPolicy() {
        return view('frontend.security');
    }

}

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
use App\Http\Requests\ChangePassRequest;
use Auth;

class FrontendController extends Controller {

    //
    public function getHome() {
        try {
            $data['newList'] = Product::where('prod_qty', '>', 0)->orderBy('prod_id', 'desc')
                    ->take(12)
                    ->get();
            $data['categories'] = Category::skip(0)->take(6)->get();
            $data['sale'] = Product::where('prod_sale', '>', '0')->orderBy('prod_sale', 'desc')->skip(1)->take(6)->get();
            $data['best'] = Product::where('prod_sale', '>', '0')->orderBy('prod_sale', 'desc')->skip(0)->take(1)->get();
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

    public function postAccount(RegisterRequest $request) {
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
            $sx = array();
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
            if (!Auth::guard('clients')->user())
                $validator = Validator::make($request->all(), [
                            'name' => 'required',
                            'email' => 'required|email',
                            'sex' => 'required',
                            'mess' => 'required'
                                ], [
                            'name.required' => 'Hãy nhập tên.',
                            'email.required' => 'Hãy nhập địa chỉ email.',
                            'sex.required' => 'Hãy nhập địa chỉ email.',
                            'mess.required' => 'Hãy nhập lời nhắn.',
                            'email.email' => 'Trường email phải có định dạng email.'
                ]);
            else {
                $validator = Validator::make($request->all(), [
                            'mess' => 'required'
                                ], [
                            'mess.required' => 'Hãy nhập lời nhắn.'
                ]);
            }
            if ($validator->fails()) {
                return back()->withErrors($validator)
                                ->withInput();
            }

            $con = new Contact;
            if (Auth::guard('clients')->user()) {
                $con->con_email = Auth::guard('clients')->user()->email;
                $con->con_name = Auth::guard('clients')->user()->name;
                $con->sex = Auth::guard('clients')->user()->sex;
                $con->con_img = Auth::guard('clients')->user()->image;
            } else {
                $con->con_email = $request->email;
                $con->con_name = $request->name;
                $con->sex = $request->sex;
            }
            $con->con_message = $request->mess;
            $con->save();
            
            return back()->with('success', 'Cảm ơn bạn vì lời nhắn. Chúng tôi sẽ cố gắng phản hồi sớm nhất!');
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
                    ->take(6)
                    ->get();
            $data['countImg'] = Gallery::where('product_id', $id)->count();
            $data['detail'] = Product::find($id);
            $data['comments'] = Comment::join('users', 'users.id', '=', 'vp_comment.com_user')
                    ->where('vp_comment.com_product', $id)
                    ->select('vp_comment.*', 'users.name', 'users.level', 'users.image')
                    ->get();
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

    public function postComment(Request $request, $id) {
        try {
            if (!Auth::guard('clients')->user())
                $validator = Validator::make($request->all(), [
                            'email' => 'required|email',
                            'content' => 'required',
                            'name' => 'required',
                                ], [
                            'name.required' => 'Hãy nhập tên.',
                            'email.required' => 'Hãy nhập Email.',
                            'email.email' => 'Hãy nhập đúng định dạng Email.',
                            'content.required' => 'Hãy nhập bình luận.'
                ]);
            else {
                $validator = Validator::make($request->all(), [
                            'content' => 'required'
                                ], [
                            'content.required' => 'Hãy nhập bình luận.'
                ]);
            }
            if ($validator->fails()) {
                return back()->withErrors($validator)
                                ->withInput();
            }

            $com = new Comment;
            if (Auth::guard('clients')->user()) {
                $filename = Auth::guard('clients')->user()->image;
                $com->com_image = $filename;
                $com->com_name = Auth::guard('clients')->user()->name;
                $com->com_email = Auth::guard('clients')->user()->email;
            } else {
                $com->com_name = $request->name;
                $com->com_email = $request->email;
            }
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
            $result = str_replace('%20s', ' ', $result);
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
            $email = Client::where('email', '=', $request->email)->count();
            if (Auth::guard('clients')->attempt($arr, true)) {
                return redirect('account/'.Auth::guard('clients')->user()->id);
            }
            elseif ($email != 0) {
                return back()->with('error', 'Mật khẩu chưa đúng.');
            }
            else 
            return back()->with('error', 'Tài khoản không tồn tại.');
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
        try {
            if ($request['password'] != $request['passwordVerify']) {
                return back()->with('error', 'Xác nhận mật khẩu chưa đúng.');
            }
                $client = Client::create([
                            'name' => $request['name'],
                            'email' => $request['email'],
                            'password' => Hash::make($request['password']),
                            'phone' => $request['phone'],
                            'address' => $request['address'],
                            'sex' => $request['sex']
                ]);
                return redirect('clientLogin')->with('success','Đăng ký tài khoản thành công.  Vui lòng đăng nhập lại.');
            } catch (ModelNotFoundException $e) {
                echo $e->getMessage();
            }
    }

    public function getPass() {
        return view('frontend.repass');
    }

    public function postPass(ChangePassRequest $request) {
        try {
            $client = new Client;
            $arr1['password'] = Hash::make($request->newpass);
            $arr = ['email' => Auth::guard('clients')->user()->email, 'password' => $request->oldpass];
            if (Auth::guard('clients')->attempt($arr, true)) {
                if ($request->newpass == $request->repass) {
                    $client::where('id', Auth::guard('clients')->user()->id)->update($arr1);
                    return back()->with('success', 'Thay đổi mật khẩu thành công.');
                }
                else 
                    return back()->with('error', 'Xác nhận mật khẩu mới chưa đúng.');
            }
            else {
                return back()->with('error', 'Mật khẩu hiện tại chưa đúng.');
            }
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getPolicy() {
        return view('frontend.security');
    }

}

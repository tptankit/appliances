<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Validator;
use App\User;
use DB;

class UserController extends Controller {

    public function user_add(Request $request) {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
                    'email' => 'required|unique:users',
                    'password' => 'required',
                    'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }
        $success = User::create([

                    'email' => $input['email'],
                    'name' => $input['name'],
                    'password' => bcrypt($input['password'])
        ]);
        if ($success) {
            return redirect()->back()->with('success', 'User account created Sucessfully!');
        }
    }

    public function login_page(Request $request) {

        return view('regiter_login');
    }

    public function login(Request $request) {

        $input = $request->all();

        $validator = Validator::make($request->all(), [
                    'email' => 'required',
                    'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }
        if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']])) {


            return redirect('/')->with('success', 'Login Sucessfully!');
        } else {
            return redirect()->back()->withInput()
                            ->with('danger', 'Username and Password are not matched');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/')->with('success', 'Logout Sucessfully!');
    }

    public function addToCart($id, Request $request) {


        $session = $request->session()->get('product_id');

        if (empty($session)) {
            $session = array($id);
        } else {
            array_push($session, $id);
        }



        $request->session()->put('product_id', $session);

        //    $request->session()->push('user.teams', 'developers');
        // $request->session()->forget('product_id');
        //$request->session()->flush();
        $data = $request->session()->all();



        return redirect()->back()->with('success', 'Item has been added to your cart.!');
    }

    public function cart(Request $request) {
        $session = $request->session()->get('product_id');
        if (!empty($session)) {
            $products = DB::table('products')
                    ->whereIn('product_id', $session)
                    ->get();
            $product_sum = DB::table('products')
                    ->whereIn('product_id', $session)
                    ->sum('price');

            $all_products = array();
            if (!empty($products)) {
                foreach ($products as $product) {
                    $products_img = DB::table('product_images')
                            ->where('product_images.product_id', $product->product_id)->take(1)
                            ->get();

                    $arr1 = json_decode(json_encode($product), true);
                    $arr2 = json_decode(json_encode(array('product_img' => $products_img)), true);


                    $all_products[] = (object) array_merge($arr1, $arr2);
                }
            }
        }
        return view('cart', compact('all_products', 'product_sum'));
    }

    public function wishlist(Request $request) {


        $products = DB::table('products')
                ->join('wishlist', 'wishlist.product_id', '=', 'products.product_id')
                ->where('wishlist.user_id', Auth::user()->id)
                ->get();


        $all_products = array();
        if (!empty($products)) {
            foreach ($products as $product) {
                $products_img = DB::table('product_images')
                        ->where('product_images.product_id', $product->product_id)->take(1)
                        ->get();

                $arr1 = json_decode(json_encode($product), true);
                $arr2 = json_decode(json_encode(array('product_img' => $products_img)), true);


                $all_products[] = (object) array_merge($arr1, $arr2);
            }
        }


        return view('wishlist', compact('all_products', 'product_sum'));
    }

    public function friendWishlist(Request $request) {


        $friends = DB::table('user_friends')
                ->join('users', 'users.id', '=', 'user_friends.user_id')
                ->where('user_friends.friend_email', Auth::user()->email)
                ->first();

if(!empty($friends)){
        $products = DB::table('products')
                ->join('wishlist', 'wishlist.product_id', '=', 'products.product_id')
                ->where('wishlist.user_id', $friends->id)
                ->get();
}
        $all_products = array();
        if (!empty($products)) {
            foreach ($products as $product) {
                $products_img = DB::table('product_images')
                        ->where('product_images.product_id', $product->product_id)->take(1)
                        ->get();

                $arr1 = json_decode(json_encode($product), true);
                $arr2 = json_decode(json_encode(array('product_img' => $products_img)), true);


                $all_products[] = (object) array_merge($arr1, $arr2);
            }
        }


        return view('friend_wishlist', compact('all_products', 'product_sum', 'friends'));
    }

    public function shareWishlist(Request $request) {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
                    'email' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }


        $checkData = DB::table('user_friends')
                ->where('user_friends.user_id', Auth::user()->id)
                ->get();

//        if (count($checkData) > 0) {
//            return redirect()->back()->with('danger', 'Only One friend allowed');
//        }
        $array = array('user_id' => Auth::user()->id,
            'friend_email' => trim($input['email']),
        );

        $id = DB::table('user_friends')
                ->insertGetId($array);


        if ($id) {
            $message = '<html><b>Dear User,  </b><br>
                                    <p> Your friend ' . Auth::user()->name . ' had shared his wishlist to you. Please login with your email id :' . $input['email'] . ' in our site.' . url('') . ' to see this wishlist </p>
                                   </html>';
            $this->simple_mail($input['email'], "E-commerce Site", $message);
        }
        return redirect()->back()->with('success', 'wishlist shared with your friend!');
    }

    public function removeCartItem($id, Request $request) {

        $session = $request->session()->get('product_id');
        $array = array($id);
        $array = array_diff($session, $array);
        $request->session()->put('product_id', $array);

        //    $request->session()->push('user.teams', 'developers');
        // $request->session()->forget('product_id');
        //$request->session()->flush();
        $data = $request->session()->all();



        return redirect()->back()->with('success', 'Item has been deleted from your cart.!');
    }

    public function removeWishlistItem($id, Request $request) {


        DB::table('wishlist')->where('wishlist_id', $id)
                ->delete();

        return redirect()->back()->with('success', 'Item has been removed from your wishlist.!');
    }

    public function addtowishlistmsg() {
        return redirect('login-register')->with('success', 'Please login to your account before item add in wishlist.');
    }

    public function addtowishlist($id) {


        $array = array('product_id' => $id, 'user_id' => Auth::user()->id);

        $checkProcess = DB::table('wishlist')
                ->where('wishlist.product_id', $id)
                ->where('wishlist.user_id', Auth::user()->id)
                ->get();

        if (count($checkProcess) != 0) {
            return redirect()->back()->with('success', 'Item is already added to your wishlist.!');
        }
        $success = DB::table('wishlist')
                ->insert($array);
        if ($success) {
            return redirect()->back()->with('success', 'Item has been added to your wishlist.!');
        }
    }

}

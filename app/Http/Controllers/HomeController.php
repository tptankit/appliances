<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Validator;
use App\User;
use DB;

class HomeController extends Controller {

    public function __construct() {
        
    }

    public function home(Request $request) {

        $categories = $this->categoryList();
        $products = DB::table('products')
                ->where('products.featured', 1)
                ->get();
        $all_products = array();
        if (!empty($products)) {
            foreach ($products as $product) {
                $products_img = DB::table('product_images')
                        ->where('product_images.product_id', $product->product_id)->take(4)
                        ->get();

                $arr1 = json_decode(json_encode($product), true);
                $arr2 = json_decode(json_encode(array('product_img' => $products_img)), true);


                $all_products[] = (object) array_merge($arr1, $arr2);
            }
        }

        return view('welcome', compact('categories', 'all_products'));
    }

    public function getProductById($id, $slug = null, Request $request) {

        $input = $request->all();

        $categories = $this->categoryList();
        if (!empty($input) && isset($input['order_by']) && $input['order_by'] != null) {
            return redirect('/category-id/' . $id . '/' . $input['order_by']);
        }
        $category_name = DB::table('categories')
                ->where('category_id', $id)
                ->first();
        $allCategory = DB::table('categories')
                ->where('parent_id', $id)
                ->get();
        $cateId = array($id);
        if (!empty($allCategory)) {
            foreach ($allCategory as $categor_id) {
                array_push($cateId, $categor_id->category_id);
            }
        }

        if ($slug != null) {

            if ($slug == 'price') {
                $products = DB::table('products')
                        ->whereIn('products.category_id', $cateId)
                        ->orderBy('price', 'ASC')
                        ->get();
            } else {
                $products = DB::table('products')
                        ->whereIn('products.category_id', $cateId)
                        ->orderBy('product_name', 'ASC')
                        ->get();
            }
        } else {
            $products = DB::table('products')
                    ->whereIn('products.category_id', $cateId)
                    ->get();
        }
      
        $all_products = array();
        if (!empty($products)) {
            foreach ($products as $product) {
                $products_img = DB::table('product_images')
                        ->where('product_images.product_id', $product->product_id)->take(4)
                        ->get();

                $arr1 = json_decode(json_encode($product), true);
                $arr2 = json_decode(json_encode(array('product_img' => $products_img)), true);


                $all_products[] = (object) array_merge($arr1, $arr2);
            }
        }



        $feature_products = DB::table('products')
                ->where('products.featured', 1)
                ->get();
        $featured_all_products = array();
        if (!empty($feature_products)) {
            foreach ($feature_products as $f_product) {
                $products_img = DB::table('product_images')
                        ->where('product_images.product_id', $f_product->product_id)->take(4)
                        ->get();

                $arr1 = json_decode(json_encode($f_product), true);
                $arr2 = json_decode(json_encode(array('product_img' => $products_img)), true);


                $featured_all_products[] = (object) array_merge($arr1, $arr2);
            }
        }

        return view('products', compact('all_products', 'categories', 'category_name', 'slug', 'featured_all_products','prev','next'));
    }

    public function productDetail($id) {
        $categories = $this->categoryList();
        $products = DB::table('products')
                ->where('products.product_id', $id)
                ->get();
        $product = array();
        if (!empty($products)) {
            foreach ($products as $product_detail) {
                $products_img = DB::table('product_images')
                        ->where('product_images.product_id', $product_detail->product_id)->take(4)
                        ->get();

                $arr1 = json_decode(json_encode($product_detail), true);
                $arr2 = json_decode(json_encode(array('product_img' => $products_img)), true);


                $product[] = (object) array_merge($arr1, $arr2);
            }
        }


        return view('product_detail', compact('product', 'categories'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Validator;
use App\User;
use DB;

class WebController extends Controller {

    public function index(Request $request) {


        include_once 'simple_html_dom.php';

        $category_id = 16;
        $html = file_get_html('https://www.appliancesdelivered.ie/small-appliances/heating/fans');

        foreach ($html->find('.product-image a') as $element) {

            $product_page = file_get_html($element->href);

            $product_title = $product_page->find('#product-title', 0)->plaintext;

        


            $price = $product_page->find('.price', 0)->plaintext;
            $price = explode("&euro;", $price)[1];
         //   $price_charge = $product_page->find('p small', 0)->plaintext;
            $keypoint1 = $product_page->find('#sticky-point div', 0)->plaintext;
//            $keypoint2 = $product_page->find('#sticky-point div', 1)->plaintext;
//            $keypoint3 = $product_page->find('#sticky-point div', 2)->plaintext;
//            $keypoint4 = $product_page->find('#sticky-point div', 3)->plaintext;

            $keypoint = array($keypoint1);
            $keypoint = json_encode($keypoint);
        //    $brand = $product_page->find('.article-brand', 0);
      //      $brandimg = $brand->src;
            $product_desc = $product_page->find('.row .tab-content #product-lg-overview', 0);

            $array = array('product_name' => trim($product_title),
                'product_description' => trim($product_desc->outertext),
              
                'price' => trim($price),
         //       'brand' => trim($brandimg),
                'key_feature' => $keypoint,
                'category_id' => $category_id,
            );

            $id = DB::table('products')
                    ->insertGetId($array);
            echo $product_title . "---" . $id . "<br>";
            $img = $product_page->find('.zoom-image');

            foreach ($img as $r) {
                $img_src[] = array('src' => trim($r->src), 'product_id' => $id);
            }
            $id = DB::table('product_images')
                    ->insert($img_src);
        }
    }

}

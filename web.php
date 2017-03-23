<?php

mysql_connect('localhost', 'root', '');
mysql_select_db('appliancesdelivered');

include_once 'simple_html_dom.php';

$category_id = 1;
$html = file_get_html('https://www.appliancesdelivered.ie/dishwashers');

foreach ($html->find('.product-image a') as $element) {

    $product_page = file_get_html($element->href);

    $product_title = $product_page->find('#product-title', 0)->plaintext;
    $pre_price = $product_page->find('.price-previous', 0)->plaintext;
    $pre_price = explode("&euro;", $pre_price)[1];
    $price = $product_page->find('.price', 0)->plaintext;
    $price = explode("&euro;", $price)[1];
    $price_charge = $product_page->find('p small', 0)->plaintext;
    $keypoint1 = $product_page->find('#sticky-point div', 0)->plaintext;
    $keypoint2 = $product_page->find('#sticky-point div', 1)->plaintext;
    $keypoint3 = $product_page->find('#sticky-point div', 2)->plaintext;
    $keypoint4 = $product_page->find('#sticky-point div', 3)->plaintext;

    $keypoint = array($keypoint1, $keypoint2, $keypoint3, $keypoint4);
    $keypoint = json_encode($keypoint);
    $brand = $product_page->find('.article-brand', 0);
    $brandimg = $brand->src;
    $product_desc = $product_page->find('.row .tab-content #product-lg-overview', 0);

      $array = array('product_name' => $product_title,
             //   'product_description' => $product_desc,
                'pre_price' => trim($pre_price),
                'price' => trim($price),
                'brand' => $brandimg,
                'key_feature' => $keypoint,
                'category_id' => $category_id,
            );
      echo "<pre>";
      print_r($array);
    $img = $product_page->find('.zoom-image');
    foreach ($img as $r) {
        $img_src = $r->src;
    }
    exit;
    
}
       

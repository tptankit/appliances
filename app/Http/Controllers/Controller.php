<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Validator;
use App\User;
use DB;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function pr($data) {
        echo "<pre>";
        print_r($data);
        exit;
    }

    public function simple_mail($email, $subject, $message) {

        require_once( base_path() . '/mailer/PHPMailerAutoload.php');
        $mail = new PHPMailer;

        $mail->SMTPDebug = 3;                               // Enable verbose debug output
        $mail->setFrom('ankitjogani99@gmail.com', 'TPT');
        $mail->addAddress($email);
        //    $mail->addCC('courses@turningpointtutors.co.za');
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if (!$mail->send()) {
            //   echo 'Message could not be sent.';
            //   echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            //    echo 'Message has been sent';
        }
    }

    public function categoryList() {
        $parents = DB::table('categories')
                ->where('parent_id', 0)
                ->get();
        if (!empty($parents)) {
            $category_array = array();
            foreach ($parents as $key => $parent) {
                $categories = DB::table('categories')
                        ->where('parent_id', $parent->category_id)
                        ->get();

                if (!empty($categories)) {
                    foreach ($categories as $c) {
                        $catego = DB::table('categories')
                                ->where('parent_id', $c->category_id)
                                ->get();
                        $arr12 = json_decode(json_encode($c), true);
                        $arr23 = json_decode(json_encode(array('child' => $catego)), true);

                        $category_array[] = array_merge($arr12, $arr23);
                    }
                }

                $arr1 = json_decode(json_encode($parent), true);
                $arr2 = json_decode(json_encode(array('child' => $category_array)), true);

                $get_all_category_infos[] = array_merge($arr1, $arr2);
            }
        };

        return $get_all_category_infos;
    }

    function fetchCategoryTreeList($parent = 0, $user_tree_array = '') {

        if (empty($user_tree_array)) {
            $user_tree_array = array();
        }
        $categories = DB::table('categories')
                ->where('parent_id', $parent)
                ->get();


        if (!empty($categories)) {
            foreach ($categories as $key => $category) {
                $user_tree_array[$key][] = $category;
                $user_tree_array = $this->fetchCategoryTreeList($category->category_id, $user_tree_array);
            }
        }
        return $user_tree_array;
    }

}

<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Mail;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Redirect;

session_start();

class HomeController extends Controller
{

    public function send_mail()
    {
        $to_name = "BookMeRead";
        $to_email = "neariroth2000@gmail.com";
        $data = array("name" => "Mail từ tài khoản khách hàng", "body" => "Mail gửi về vấn đề hàng hóa");
        Mail::send('pages.send_mail', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email)->subject('Test to send mail to google');
            $message->from($to_email, $to_name);
        });
        // return redirect('/')->with('message', '');
    }

    public function index()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();

        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderby('brand_id', 'desc')->get();

        // $name_brand = DB::table('tbl_brand')->where('brand_status', '0')->orderby('brand-name', 'desc')->limit(1)->get();

        $all_product = DB::table('tbl_product')->where('product_status', '0')->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')->orderby('product_id', 'desc')->limit(100)->get();


        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
        // ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
        // ->orderby('tbl_product.product_id', 'desc')
        // ->get();
        return view('pages.home')->with('category', $cate_product)
            ->with('brand', $brand_product)->with('all_product', $all_product)->with('name', $all_product);
    }
}

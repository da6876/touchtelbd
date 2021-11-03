<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use Session;
use Redirect;

class CustomerController extends Controller
{
    public function AuthCheck()
    {
        $name = Session::get('user_name');
        if ($name) {
            return;
        } else {
            return Redirect::to('Login')->send();;
        }
    }

    public function index()
    {
        $this->AuthCheck();

        try {
            DB::connection()->getPdo();
            return view('customer.cutomer_info');
        } catch (\Exception $e) {
            return view('errorpage.database_error');
        }
    }

    public function store(Request $request)
    {
        try {
            $data = array();
            $data['customer_name'] = $request['customer_name'];
            $data['customer_phone'] = $request['customer_phone'];
            $data['customer_email'] = $request['customer_email'];
            $data['customer_address'] = $request['customer_address'];
            $data['customer_status'] = $request['customer_status'];
            $data['create_by'] = Session::get('user_name');;

            $image_one = $request['customer_photo'];
            if ($image_one) {
                $ran_one = str_random(15);
                $ext_one = strtolower($image_one->getClientOriginalExtension());
                $one_full_name = $ran_one .'.'. $ext_one;
                $upload_path_one = "allImages/ProductImages/";
                $image_url_one = $upload_path_one . $one_full_name;
                $success_one = $image_one->move($upload_path_one, $one_full_name);

                $data['customer_photo'] = $image_url_one;
                $result = DB::table('customer_info')->insert($data);
                return json_encode(array(
                    "statusCode" => 200,
                    "statusMsg" => "New Customer Added Successfully"
                ));
            } else {
                $data['customer_photo'] = "No Image";
                $result = DB::table('customer_info')->insert($data);
                return json_encode(array(
                    "statusCode" => 200,
                    "statusMsg" => "New Customer Added Successfully"
                ));
            }



        } catch (\Exception $e) {
            DB::rollBack();
            return ["o_status_message" => $e->getMessage()];
        }
    }

    public function show($id)
    {
        $singleDataShow = DB::table('customer_info')
            ->where('customer_info_id', $id)
            ->get();
        return $singleDataShow;
    }

    public function destroy($id)
    {
        DB::table('customer_info')
            ->where('customer_info_id', $id)
            ->delete();
        return json_encode(array(
            "statusCode" => 200
        ));
    }

    public function getAllCustomer()
    {

        $categories = DB::table('customer_info')
            ->get();

        return DataTables::of($categories)
            ->addColumn('action', function ($categories) {
                $buttton = '
                <div class="button-list">
                    <a onclick="showcategoriesData(' . $categories->customer_info_id . ')" role="button" href="#" class="btn btn-success btn-sm"><i class="fa fa-external-link-square bigfonts"></i></a>
                    <a onclick="deletecategoriesData(' . $categories->customer_info_id . ')" role="button" href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash-o bigfonts"></i></a>
                </div>
                ';
                return $buttton;
            })
            ->rawColumns(['action'])
            ->toJson();

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use Session;
use Redirect;

class ProductInfoController extends Controller
{
    public function AuthCheck(){
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
            return view('productconfig.product_info');
        } catch (\Exception $e) {
            return view('errorpage.database_error');
        }
    }

    public function indexs()
    {
        $this->AuthCheck();

        try {
            DB::connection()->getPdo();
            return view('productconfig.product_add');
        } catch (\Exception $e) {
            return view('errorpage.database_error');
        }
    }


    public function store(Request $request)
    {
        try {
            if ($request['product_id']=="") {
                $data = array();
                $data['product_name'] = $request['product_name'];
                $data['product_type_id'] = $request['product_type_id'];
                $data['Categorie_id'] = $request['Categorie_id'];
                $data['decs'] = $request['decs'];
                $data['product_status'] = $request['product_status'];
                $data['create_by'] = Session::get('user_info_id');
                $data['update_by'] = "N";

                $image_one = $request['product_image'];
                if ($image_one) {
                    $ran_one = str_random(15);
                    $ext_one = strtolower($image_one->getClientOriginalExtension());
                    $one_full_name = $ran_one . '.' . $ext_one;
                    $upload_path_one = "allImages/ProductImages/";
                    $image_url_one = $upload_path_one . $one_full_name;
                    $success_one = $image_one->move($upload_path_one, $one_full_name);

                    $data['product_image'] = $image_url_one;
                    $result = DB::table('product_info')->insert($data);
                    return json_encode(array(
                        "statusCode" => 200,
                        "statusMsg" => "New Product Added Successfully"
                    ));
                } else {

                    return json_encode(array(
                        "statusCode" => 201,
                        "statusMsg" => "Please Select Product Image !!"
                    ));
                }
            }else{
                $data = array();
                $data['product_name'] = $request['product_name'];
                $data['product_type_id'] = $request['product_type_id'];
                $data['Categorie_id'] = $request['Categorie_id'];
                $data['decs'] = $request['decs'];
                $data['product_status'] = $request['product_status'];
                $data['update_by'] = Session::get('user_info_id');

                $image_one = $request['product_image'];
                if ($image_one) {
                    $ran_one = str_random(15);
                    $ext_one = strtolower($image_one->getClientOriginalExtension());
                    $one_full_name = $ran_one . '.' . $ext_one;
                    $upload_path_one = "allImages/ProductImages/";
                    $image_url_one = $upload_path_one . $one_full_name;
                    $success_one = $image_one->move($upload_path_one, $one_full_name);

                    $data['product_image'] = $image_url_one;

                    DB::table('product_info')
                        ->where('product_id', $request['product_id'])
                        ->update($data);
                    return json_encode(array(
                        "statusCode" => 200,
                        "statusMsg" => "Product Update Successfully"
                    ));
                } else {

                    return json_encode(array(
                        "statusCode" => 201,
                        "statusMsg" => "Please Select Product Image !!"
                    ));
                }
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return ["exception" => true, "o_status_code" => 99, "o_status_message" => $e->getMessage()];
        }

    }


    public function show($id)
    {
        $singleDataShow = DB::table('product_info')
            ->where('product_id', $id)
            ->get();
        return $singleDataShow;
    }

    public function destroy($id)
    {
        $data['product_status'] ="D";
        DB::table('product_info')
            ->where('product_id', $id)
            ->update($data);

        return json_encode(array(
            "statusCode" => 200
        ));
    }

    public function getAllProductInfo()
    {

        $categories = DB::select('SELECT product_id,product_name,product_type_id,Categorie_id,decs,product_image, product_status, create_by, update_by, create_info,update_info FROM product_info WHERE product_status ="Active";');

        return DataTables::of($categories)
            ->addColumn('action', function ($categories) {
                $buttton = '
                <div class="button-list">
                    <a onclick="editProductData(' . $categories->product_id . ')" role="button" href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit bigfonts"></i></a>
                    <a onclick="deleteProductData(' . $categories->product_id . ')" role="button" href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash-o bigfonts"></i></a>
                </div>
                ';
                return $buttton;
            })
            ->rawColumns(['action'])
            ->toJson();

    }


    public function showSubCat()
    {

        $ViewType = request()->input('ViewType');

        if ($ViewType == "SubCategorie") {
            $Cat_id = request()->input('Cat_id');

            try {
                $categories_sub = DB::table('categories_sub')
                    ->where('categories_id', $Cat_id)
                    ->get();
                return json_encode($categories_sub);
            } catch (\Exception $e) {
                DB::rollBack();
                return ["o_status_message" => $e->getMessage()];
            }

        }

    }

    public function showProductType()
    {
        try {
            $categories_sub = DB::table('product_type')
                ->get();
            return json_encode($categories_sub);
        } catch (\Exception $e) {
            DB::rollBack();
            return ["o_status_message" => $e->getMessage()];
        }
    }
    public function showCategoris()
    {
        try {
            $categories_sub = DB::table('categories')
                ->get();
            return json_encode($categories_sub);
        } catch (\Exception $e) {
            DB::rollBack();
            return ["o_status_message" => $e->getMessage()];
        }
    }
}

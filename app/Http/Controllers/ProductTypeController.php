<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use Session;
use Redirect;

class ProductTypeController extends Controller
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
            return view('productconfig.product_type');
        } catch (\Exception $e) {

            return view('errorpage.database_error');
        }
    }

    public function store(Request $request)
    {
        try {
            if ($request['product_type_id']==""){
                $data = array();
                $data['product_type_name'] = $request['product_type_name'];
                $data['product_type_status'] = $request['product_type_status'];

                $result = DB::table('product_type')->insert($data);
                return json_encode(array(
                    "statusCode" => 200,
                    "statusMsg" => "Product Type Added Successfully"
                ));
            }else{
                $data = array();
                $product_type_id = $request['product_type_id'];
                $data['product_type_name'] = $request['product_type_name'];
                $data['product_type_status'] = $request['product_type_status'];

                DB::table('product_type')
                    ->where('product_type_id', $product_type_id)
                    ->update($data);

                return json_encode(array(
                    "statusCode" => 200,
                    "statusMsg" => "Product Type Update Successfully"
                ));
            }

        } catch (\Exception $e) {

            return json_encode(array(
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ));;
        }
    }

    public function show($id)
    {
        try {
            $singleDataShow = DB::table('product_type')
                ->where('product_type_id', $id)
                ->get();
            return $singleDataShow;
        } catch (\Exception $e) {

            return json_encode(array(
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ));;
        }
    }

    public function destroy($id)
    {
        try {
            DB::table('product_type')
                ->where('product_type_id', $id)
                ->delete();
            return json_encode(array(
                "statusCode" => 200
            ));
        } catch (\Exception $e) {

            return json_encode(array(
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ));;
        }
    }

    public function getAllProductType()
    {

        $ProductType = DB::table('product_type')
            ->get();

        return DataTables::of($ProductType)
            ->addColumn('action', function ($ProductType) {
                $buttton = '
                <div class="button-list">
                    <a onclick="showproduct_typeData(' . $ProductType->product_type_id . ')" role="button" href="#" class="btn btn-success btn-sm"><i class="fa fa-external-link-square bigfonts"></i></a>
                    <a onclick="deleteproduct_typeData(' . $ProductType->product_type_id . ')" role="button" href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash-o bigfonts"></i></a>
                </div>
                ';
                return $buttton;
            })
            ->rawColumns(['action'])
            ->toJson();

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use Session;


class ProductStockController extends Controller
{
    public function index()
    {
        try {
            DB::connection()->getPdo();
            return view('productstock.product_stock');
        } catch (\Exception $e) {

            return view('errorpage.database_error');
        }
    }

    public function indexs()
    {
        try {
            DB::connection()->getPdo();
            return view('productstock.product_stock_bulk');
        } catch (\Exception $e) {

            return view('errorpage.database_error');
        }
    }

    public function indexView()
    {
        try {
            DB::connection()->getPdo();
            return view('productstock.product_stock_info');
        } catch (\Exception $e) {

            return view('errorpage.database_error');
        }
    }


    public function create()
    {
        //
    }

    public function showProductList()
    {
        try {
            $categories_sub = DB::table('product_info')
                ->get();
            return json_encode($categories_sub);
        } catch (\Exception $e) {
            DB::rollBack();
            return ["o_status_message" => $e->getMessage()];
        }
    }

    public function addMorePost(Request $request)
    {
        try {
            $product_id = $request['product_id'];
            $qnty = $request['qnty'];
            $unit_price = $request['unit_price'];
            $sell_price = $request['sell_price'];
            $bar_code = $request['bar_code'];
            $ime = $request['ime'];
            $color = $request['color'];
            $product_stock_status = $request['product_stock_status'];
            count($product_id);
            $data = array();
            for ($x = 0; $x < count($product_id); $x++) {

                $data['invice_no'] = $request['invice_no'];
                $data['product_id'] = $product_id[$x];
                $data['shot_decs'] = ".";
                $data['qty'] = $qnty[$x];
                $data['color'] = $color[$x];
                $data['unit_price'] =  $unit_price[$x];
                $data['sell_price'] = $sell_price[$x];
                $data['product_br_code'] = $bar_code[$x];
                $data['product_ime'] = $ime[$x];
                $data['product_stock_status'] = $product_stock_status[$x];
                $data['create_by'] = Session::get('user_info_id');
                $data['update_by'] = "N";

                $result = DB::table('product_stock')->insert($data);

            }
            return json_encode(array(
                "statusCode" => 200,
                "statusMsg" => "Product Stock Bulk Added Successfully"
            ));



        } catch (\Exception $e) {
            DB::rollBack();
            return ["o_status_message" => $e->getMessage()];
        }
    }

    public function store(Request $request)
    {
        $data = array();
        $data['invice_no'] = $request['invice_no'];
        $data['product_id'] = $request['product_id'];
        $data['shot_decs'] = $request['shot_decs'];
        $data['qty'] = $request['qnty'];
        $data['color'] = $request['color'];
        $data['unit_price'] = $request['unit_price'];
        $data['sell_price'] = $request['sell_price'];
        $data['product_br_code'] = $request['product_br_code'];
        $data['product_ime'] = $request['product_ime'];
        $data['product_stock_status'] = $request['product_stock_status'];
        $data['create_by'] = Session::get('user_info_id');
        $data['update_by'] = "N";


        $result = DB::table('product_stock')->insert($data);
        return json_encode(array(
            "statusCode" => 200,
            "statusMsg" => "Product Stock Added Successfully"
        ));

    }


    public function show($id)
    {
        $singleDataShow = DB::table('user_type')
            ->where('user_type_id', $id)
            ->get();
        return $singleDataShow;
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        DB::table('product_stock')
            ->where('product_stock_id', $id)
            ->delete();
        return json_encode(array(
            "statusCode" => 200
        ));
    }

    public function getAllStockInfo()
    {

        $product_stock = DB::select('SELECT product_stock_id, invice_no,PI.product_name , qty, unit_price,
                                        product_br_code, PS.create_info, product_stock_status 
                                        FROM product_stock PS,product_info PI
                                        WHERE PS.product_id = PI.product_id');
        //return json_encode($product_stock);
        return DataTables::of($product_stock)
            ->addColumn('action', function ($product_stock) {
                $buttton = '
                <div class="button-list">
                    <a onclick="deleteStockData(' . $product_stock->product_stock_id . ')" role="button" href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash-o bigfonts"></i></a>
                </div>
                ';
                return $buttton;
            })
            ->rawColumns(['action'])
            ->toJson();

    }
}

/*
<a onclick="showproduct_stockData(' . $product_stock->product_stock_id . ')" role="button" href="#" class="btn btn-success btn-sm"><i class="fa fa-external-link-square bigfonts"></i></a>
                    <a onclick="editproduct_stockData(' . $product_stock->product_stock_id . ')" role="button" href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit bigfonts"></i></a>
                    */

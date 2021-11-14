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

    public function showCompanyList()
    {
        try {
            $categories_sub = DB::table('company_info')
                ->get();
            return json_encode($categories_sub);
        } catch (\Exception $e) {
            DB::rollBack();
            return ["o_status_message" => $e->getMessage()];
        }
    }

    public function addStockMST(Request $request)
    {
        try {
            $dataMST = array();
            $primaraynumber = $request['primaraynumber'];
            $dataMST['product_id'] = $request['product_id'];
            $dataMST['company_id'] = $request['company_id'];
            $dataMST['invice_no'] = $request['invice_no'];
            $dataMST['shot_decs'] = $request['shot_decs'];
            $dataMST['qty'] = $request['qnty'];
            $dataMST['product_stock_status'] = $request['product_stock_status'];
            $dataMST['create_by'] = Session::get('user_info_id');
            $dataMST['create_date'] = $this->getDates();
            $dataMST['update_by'] = "N";
            $dataMST['primaryvalue'] = $request['primaraynumber'];
            $result = DB::table('product_stock_mst')->insert($dataMST);
            if ($result) {
                $product_stock_mst_idCbeck = DB::select("SELECT product_stock_mst_id FROM product_stock_mst 
                                WHERE primaryvalue = '$primaraynumber'");

                if ($product_stock_mst_idCbeck) {

                    $product_stock_mst_id = $product_stock_mst_idCbeck[0]->product_stock_mst_id;

                    $color = $request['color'];
                    $unit_price = $request['unit_price'];
                    $sell_price = $request['sell_price'];
                    $product_brcode = $request['product_brcode'];
                    $product_imei = $request['product_imei'];
                    $data = array();
                    for ($x = 0; $x < count($product_imei); $x++) {
                        $data['product_id'] = $request['product_id'];
                        $data['invice_no'] = $request['invice_no'];
                        $data['color'] = $color[$x];
                        $data['unit_price'] = $unit_price[$x];
                        $data['sell_price'] = $sell_price[$x];
                        $data['product_brcode'] = $product_brcode[$x];
                        $data['product_imei'] = $product_imei[$x];
                        $data['create_by'] = Session::get('user_info_id');
                        $data['create_date'] = $this->getDates();
                        $data['update_by'] = "N";
                        $data['sell_status'] = "1";
                        $resultDtl= DB::table('product_stock_dtl')->insert($data);
                    }
                    return json_encode(array(
                        "statusCode" => 200,
                        "statusMsg" => "Product Stock Info Added Successfully"
                    ));

                }

                else {
                    return json_encode(array(
                        "statusCode" => 201,
                        "statusMsg" => "Failed To add Product Stock"
                    ));
                }

            }

            else {
                return json_encode(array(
                    "statusCode" => 201,
                    "statusMsg" => "Failed To add Product Stock!!"
                ));
            }

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
                $data['unit_price'] = $unit_price[$x];
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

        $product_stock = DB::select('SELECT PSM.product_stock_mst_id, PSM.product_id,PI.product_name, 
                                    PSM.company_id,CI.company_name,PSM.invice_no,PSM.qty,
                                    (Select count(sell_status) from product_stock_dtl where product_id=PSM.product_id AND invice_no=PSM.invice_no AND sell_status=1 ) as avalable_qty
                                    FROM product_stock_mst PSM,product_stock_dtl PSD,company_info CI,product_info PI
                                    WHERE PSM.invice_no =PSD.invice_no
                                    AND PSM.company_id = CI.company_id
                                    AND PSM.product_id = PI.product_id
                                    GROUP BY PSM.product_id,PSM.invice_no
                                    ORDER BY PSM.product_stock_mst_id;');
       // return json_encode($product_stock);
        return DataTables::of($product_stock)
            ->addColumn('action', function ($product_stock) {
                $buttton = '
                <div class="button-list">
                    <a onclick="deleteStockData(' . $product_stock->product_stock_mst_id . ')" role="button" href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash-o bigfonts"></i></a>
                </div>
                ';
                return $buttton;
            })
            ->rawColumns(['action'])
            ->toJson();

    }

    public function getStockInfoDetails(){
        $DetailsStock =  DB::select("SELECT PSM.product_stock_mst_id, PSM.product_id,PI.product_name, 
                                    PSM.company_id,CI.company_name,PSM.invice_no,PSM.qty,
                                    (Select count(sell_status) from product_stock_dtl where product_id=PSM.product_id AND invice_no=PSM.invice_no AND sell_status=1 ) as avalable_qty,
                                    UI.user_name,PSM.create_by,PSM.create_date
                                    FROM product_stock_mst PSM,product_stock_dtl PSD,company_info CI,product_info PI,user_info UI
                                    WHERE PSM.invice_no =PSD.invice_no
                                    AND PSM.company_id = CI.company_id
                                    AND PSM.product_id = PI.product_id
                                    AND PSM.create_by = UI.user_info_id
                                    GROUP BY PSM.product_id,PSM.invice_no
                                    ORDER BY PSM.product_stock_mst_id;");

        return view('report.stock_report')->with('DetailsStock', $DetailsStock);
    }


    public function getDates()
    {
        $Date = "";
        date_default_timezone_set("Asia/Dhaka");
        return $Date = date("d/m/Y");
    }
}



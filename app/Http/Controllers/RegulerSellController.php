<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use Session;
use Redirect;

class RegulerSellController extends Controller
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
            return view('reguler_sell');
        } catch (\Exception $e) {
            return view('errorpage.database_error');
        }
    }

    public function indexs($invoiceNo){
        $this->AuthCheck();

        try {

            $categories = DB::select("SELECT invoice_no, PO.product_id,PI.product_name,PSD.color,PSD.product_imei,
                        PO.product_brcode,qty,PO.sell_price,PO.create_by,PO.create_Date,
                        PO.customer_info_id,CI.customer_name,CI.customer_phone,CI.customer_email,CI.customer_address
                        FROM product_order PO,product_info PI,customer_info CI,product_stock_dtl PSD
                        WHERE PO.invoice_no = '$invoiceNo'
                        AND PO.product_id = PI.product_id
                        AND PO.customer_info_id =CI.customer_info_id
                        AND PO.product_brcode= PSD.product_brcode;");
           $data = array();
           $data1 = array();
            $data2 = array();
            for ($x = 0; $x < count($categories); $x++) {

                $data1['invoice_no'] = $categories[$x]->invoice_no;
                $invoice_no = $categories[$x]->invoice_no;
                $data1['create_by'] = $categories[$x]->create_by;
                $create_by = $categories[$x]->create_by;
                $data1['create_Date'] = $categories[$x]->create_Date;
                $create_Date = $categories[$x]->create_Date;
                $data1['customer_info_id'] = $categories[$x]->customer_info_id;
                $data1['customer_name'] = $categories[$x]->customer_name;
                $customer_name = $categories[$x]->customer_name;
                $data1['customer_email'] = $categories[$x]->customer_email;
                $customer_email = $categories[$x]->customer_email;
                $customer_phone = $categories[$x]->customer_phone;
                $data1['customer_address'] = $categories[$x]->customer_address;
                $customer_address = $categories[$x]->customer_address;

                $data2['product_id'][$x] = $categories[$x]->product_id;
                $data2['product_name'][$x] = $categories[$x]->product_name;
                $data2['product_imei'][$x] = $categories[$x]->product_imei;
                $data2['product_brcode'][$x] = $categories[$x]->product_brcode;
                $data2['qty'][$x] = $categories[$x]->qty;
                $data2['sell_price'][$x] = $categories[$x]->sell_price;
                $data2['update_date'][$x]= "N";

                $data['singleinfo']=$data1;
                $data['multipleinfo']=$data2;
            }
           //return json_encode($data);
           // return view('report.cash_memo', compact('data1','data2'));
            return view('report.cash_memo')
                ->with('invoice_no', $invoice_no)
                ->with('create_Date', $create_Date)
                ->with('customer_name', $customer_name)
                ->with('customer_phone', $customer_phone)
                ->with('customer_email', $customer_email)
                ->with('customer_address', $customer_address)
                ->with('create_by', $create_by);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getAllProductInfoForSell()
    {

        $categories = DB::select("SELECT PSM.product_stock_mst_id,PI.product_id,
                                    CONCAT( PI.product_name,' - InVoice : ',PSM.invice_no,' - Price : ',PSD.sell_price)  AS name
                                    ,PSD.sell_price,product_name,PSD.product_imei,color
                                    FROM product_info PI,product_stock_mst PSM,product_stock_dtl PSD
                                    WHERE PI.product_id = PSM.product_id
                                    AND PSM.product_id =  PSD.product_id
                                    AND PSM.invice_no =  PSD.invice_no
                                    and PSD.sell_status >0;");

        return DataTables::of($categories)
            ->addColumn('action', function ($categories) {
                $buttton = '
                <div class="button-list">
                    <a onclick="showProductData(' . "'$categories->product_id'" . ',' . "'$categories->product_name'" . ',' . "'$categories->sell_price'" . ',' . "'$categories->product_imei'" . ',' . "'$categories->color'" . ')" role="button" href="#" class="btn btn-success btn-sm"><i class="fa fa-cart-plus"></i></a>
                </div>
                ';
                return $buttton;
            })
            ->rawColumns(['action'])
            ->toJson();

    }

    public function getLastSellInfo()
    {

        $categories = DB::select("SELECT PO.invoice_no, PO.product_id,PI.product_name,PO.customer_info_id,CI.customer_name,
                                    PO.qty, PO.sell_price, PO.create_by,UI.user_name
                                    FROM product_order PO,customer_info CI,product_info PI,user_info UI
                                    WHERE CI.customer_info_id = PO.customer_info_id
                                    AND PO.product_id = PI.product_id
                                    AND PO.create_by = UI.user_info_id;");

        return DataTables::of($categories)
            ->addColumn('action', function ($categories) {
                $buttton = '
                <div class="button-list">
                    <a onclick="showSellInfoByInvoice(' . "'$categories->invoice_no'" . ')" role="button" href="#" class="btn btn-success btn-sm"><i class="fa fa-cart-plus"></i></a>
                </div>
                ';
                return $buttton;
            })
            ->rawColumns(['action'])
            ->toJson();

    }

    function fetch(Request $request)
    {
        try {
            if ($request->get('query')) {
                $query = $request->get('query');
                $data = DB::table('customer_info')
                    ->where('customer_name', 'LIKE', "%{$query}%")
                    ->get();
                $output = '<ul id="myid" class="list-group" style="display:block; position:relative">';

                foreach ($data as $row) {
                    $output .= '<li class="list-group-item list-group-item-action list-group-item-light" onclick="setData(' ."' $row->customer_info_id'". ','."' $row->customer_name'".','."' $row->customer_phone'".','."' $row->customer_address'".')" id=' . $row->customer_info_id . '><a href="#">' . $row->customer_name . '</a></li>';
                }
                $output .= '<li class="list-group-item list-group-item-action list-group-item-success" onclick="addCustomer()"><a href="#">Add Customer</a></li>';
                $output .= '</ul>';
                echo $output;
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return ["o_status_message" => $e->getMessage()];
        }
    }

    public function showProductByBarCode(){
        $ViewType= request()->input('ViewType');

        if ($ViewType=="BarCode"){
            $code = request()->input('code');

            try {
                $productInfo = DB::select("SELECT PI.product_id,PSD.product_brcode,PSM.product_stock_mst_id,PI.product_id,PSD.sell_price,product_name,PSD.product_imei,color
                                    FROM product_info PI,product_stock_mst PSM,product_stock_dtl PSD
                                    WHERE PI.product_id = PSM.product_id
                                    AND PSM.invice_no =  PSD.invice_no
                                    AND PSM.product_id =  PSD.product_id
                                    and PSD.product_brcode = '$code'
                                    and PSD.sell_status >0;");

                return json_encode($productInfo);
            } catch (\Exception $e) {
                DB::rollBack();
                return ["o_status_message" => $e->getMessage()];
            }

        }
    }

    public function saveOrderData(Request $request)
    {
        try {
            $invoice_no = $request['invoice_no'];
            $customer_id = $request['customer_id'];
            $product_id = $request['product_id'];
            $product_brcode = $request['product_brcode'];
            $qnty = $request['quantity'];
            $total_cost = $request['total_cost'];
            $DeuAmount = $request['DeuAmount'];
            $ReceiveAmount = $request['ReceiveAmount'];
            $GrandTotal = $request['GrandTotal'];
            $discount_price = $request['discount_price'];
            $product_order_status = "Success";

            $data1 = array();
            $data2 = array();
            for ($x = 0; $x < count($product_id); $x++) {

                $data1['invoice_no'] = $invoice_no;
                $data1['product_id'] = $product_id[$x];
                $product_brcode11= $product_brcode[$x];
                $data1['product_brcode'] = $product_brcode[$x];
                $data1['customer_info_id'] = $customer_id;
                $data1['qty'] = $qnty[$x];
                $data1['sell_price'] = $total_cost[$x];
                $data1['create_by'] =Session::get('user_info_id');
                $data1['create_date'] =$this->getDates();
                $data1['update_by'] = "N";
                $data1['update_date'] = "N";

                $data2['invoice_no'] = $invoice_no;
                $data2['discount_price'] = $discount_price;
                $data2['recive_amount'] =$ReceiveAmount;
                $data2['grand_total'] = $GrandTotal;
                $data2['deu_amount'] = $DeuAmount;
                $data2['payment_type'] = $request['payment_type'];
                $data2['product_order_status'] = $request['product_order_status'];
                $data2['create_by'] =Session::get('user_info_id');
                $data2['create_date'] =$this->getDates();
                $data2['update_by'] = "N";
                $data2['update_date'] = "N";

                $result = DB::table('product_order')->insert($data1);
                $result1 = DB::table('product_order_invoice')->insert($data2);

                $data11 = array();
                $data11['sell_status'] = "0";

                DB::table('product_stock_dtl')
                    ->where('product_brcode', $product_brcode11)
                    ->update($data11);
            }


            return json_encode(array(
                "statusCode" => 200,
                "invoice_no" => $invoice_no,
                "statusMsg" => "Order Place Successfully && Invoice No: ".$invoice_no
            ));



        } catch (\Exception $e) {
            DB::rollBack();
            return ["o_status_message" => $e->getMessage()];
        }
    }


    public function getDates()
    {
        $Date = "";
        date_default_timezone_set("Asia/Dhaka");
        return $Date = date("Y/m/d");
    }
}

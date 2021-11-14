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

            $categories = DB::select("SELECT PO.product_order_id,PO.invoice_no,PO.service_price,PO.discount_price,
                                PO.recive_amount,PO.deu_amount,PO.grand_total,PO.payment_type,PO.product_order_status,
                                PO.create_by,PO.create_Date,PO.customer_info_id,CI.customer_name,CI.customer_phone,
                                CI.customer_email,CI.customer_address,POI.product_id,PI.product_name,PSD.color,
                                PSD.product_imei,PSD.product_brcode,PSD.sell_price
                                FROM product_order PO,customer_info CI,product_order_invoice POI,
                                product_info PI,product_stock_mst PSM,product_stock_dtl PSD
                                WHERE PO.invoice_no = '$invoiceNo'
                                AND PO.customer_info_id=CI.customer_info_id
                                AND PO.invoice_no = POI.invoice_no
                                AND POI.product_id= PI.product_id
                                AND PI.product_id= PSM.product_id
                                AND PI.product_id= PSD.product_id
                                AND PSD.product_id = PSM.product_id
                                AND PSD.invice_no = PSM.invice_no
                                GROUP BY PSD.product_id;");

            $data2 = array();
            for ($x = 0; $x < count($categories); $x++) {
                $invoice_no = $categories[$x]->invoice_no;
                $payment_type = $categories[$x]->payment_type;
                $product_order_status = $categories[$x]->product_order_status;
                $create_by = $categories[$x]->create_by;
                $create_Date = $categories[$x]->create_Date;
                $customer_name = $categories[$x]->customer_name;
                $customer_email = $categories[$x]->customer_email;
                $customer_phone = $categories[$x]->customer_phone;
                $customer_address = $categories[$x]->customer_address;
                $service_price = $categories[$x]->service_price;
                $discount_price = $categories[$x]->discount_price;
                $recive_amount = $categories[$x]->recive_amount;
                $deu_amount = $categories[$x]->deu_amount;
                $grand_total = $categories[$x]->grand_total;

                $data2['product_id'][$x] = $categories[$x]->product_id;
                $data2['product_name'][$x] = $categories[$x]->product_name;
                $data2['product_imei'][$x] = $categories[$x]->product_imei;
                $data2['product_brcode'][$x] = $categories[$x]->product_brcode;
                $data2['color'][$x] = $categories[$x]->color;
                $data2['sell_price'][$x] = $categories[$x]->sell_price;

                $data2['update_date'][$x]= "N";

                $product_id= $data2['product_id'];
                $product_name= $data2['product_name'];
                $product_brcode= $data2['product_brcode'];
                $product_imei= $data2['product_imei'];
                $color= $data2['color'];
                $sell_price= $data2['sell_price'];
            }
            return view('report.cash_memo')
                ->with('invoice_no', $invoice_no)
                ->with('payment_type', $payment_type)
                ->with('product_order_status', $product_order_status)
                ->with('create_Date', $create_Date)
                ->with('customer_name', $customer_name)
                ->with('customer_phone', $customer_phone)
                ->with('customer_email', $customer_email)
                ->with('customer_address', $customer_address)
                ->with('service_price', $service_price)
                ->with('discount_price', $discount_price)
                ->with('recive_amount', $recive_amount)
                ->with('deu_amount', $deu_amount)
                ->with('grand_total', $grand_total)
                ->with('product_id', $product_id)
                ->with('product_name', $product_name)
                ->with('product_brcode', $product_brcode)
                ->with('product_imei', $product_imei)
                ->with('color', $color)
                ->with('sell_price', $sell_price)
                ->with('create_by', $create_by);

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    function invoicesearch(){
        $this->AuthCheck();

        try {
            DB::connection()->getPdo();
            return view('report.search_invoice');
        } catch (\Exception $e) {
            return view('errorpage.database_error');
        }
    }

    function invoiceSearchIN(){
        $this->AuthCheck();

        try {
            DB::connection()->getPdo();
            return view('report.search_invoice_in');
        } catch (\Exception $e) {
            return view('errorpage.database_error');
        }
    }

    function searchInvoiceByNo(Request $request)
    {
        try {
            if ($request->get('query')) {
                $query = $request->get('query');
                $data = DB::table('product_order')
                    ->where('invoice_no', 'LIKE', "%{$query}%")
                    ->get();
                $output = '<ul id="myid" class="list-group" style="display:block; position:relative">';

                foreach ($data as $row) {
                    $output .= '<li class="list-group-item list-group-item-action list-group-item-light" onclick="setData(' ."' $row->invoice_no'". ')" id=' . $row->invice_no . '><a href="#">' . $row->invice_no . '</a></li>';
                }
                $output .= '</ul>';
                echo $output;
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return ["o_status_message" => $e->getMessage()];
        }
    }

    function searchInvoiceByNoIn(Request $request)
    {
        try {
            if ($request->get('query')) {
                $query = $request->get('query');
                $data = DB::table('product_stock_mst')
                    ->where('invice_no', 'LIKE', "%{$query}%")
                    ->groupBy('invice_no')
                    ->get();
                $output = '<ul id="myid" class="list-group" style="display:block; position:relative">';

                foreach ($data as $row) {
                    $output .= '<li class="list-group-item list-group-item-action list-group-item-light" onclick="setData(' ."' $row->invice_no'". ')" id=' . $row->invice_no . '><a href="#">' . $row->invice_no . '</a></li>';
                }
                $output .= '</ul>';
                echo $output;
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return ["o_status_message" => $e->getMessage()];
        }
    }

    public function invoiceSearchNo($invoiceNo){
        $this->AuthCheck();

        try {

            $categories = DB::select("SELECT PO.product_order_id,PO.invoice_no,PO.service_price,PO.discount_price,
                                PO.recive_amount,PO.deu_amount,PO.grand_total,PO.payment_type,PO.product_order_status,
                                PO.create_by,PO.create_Date,PO.customer_info_id,CI.customer_name,CI.customer_phone,
                                CI.customer_email,CI.customer_address,POI.product_id,PI.product_name,PSD.color,
                                PSD.product_imei,PSD.product_brcode,PSD.sell_price
                                FROM product_order PO,customer_info CI,product_order_invoice POI,
                                product_info PI,product_stock_mst PSM,product_stock_dtl PSD
                                WHERE PO.invoice_no = '$invoiceNo'
                                AND PO.customer_info_id=CI.customer_info_id
                                AND PO.invoice_no = POI.invoice_no
                                AND POI.product_id= PI.product_id
                                AND PI.product_id= PSM.product_id
                                AND PI.product_id= PSD.product_id
                                AND PSD.product_id = PSM.product_id
                                AND PSD.invice_no = PSM.invice_no
                                GROUP BY PSD.product_id;");

            $data2 = array();
            for ($x = 0; $x < count($categories); $x++) {
                $invoice_no = $categories[$x]->invoice_no;
                $payment_type = $categories[$x]->payment_type;
                $product_order_status = $categories[$x]->product_order_status;
                $create_by = $categories[$x]->create_by;
                $create_Date = $categories[$x]->create_Date;
                $customer_name = $categories[$x]->customer_name;
                $customer_email = $categories[$x]->customer_email;
                $customer_phone = $categories[$x]->customer_phone;
                $customer_address = $categories[$x]->customer_address;
                $service_price = $categories[$x]->service_price;
                $discount_price = $categories[$x]->discount_price;
                $recive_amount = $categories[$x]->recive_amount;
                $deu_amount = $categories[$x]->deu_amount;
                $grand_total = $categories[$x]->grand_total;

                $data2['product_id'][$x] = $categories[$x]->product_id;
                $data2['product_name'][$x] = $categories[$x]->product_name;
                $data2['product_imei'][$x] = $categories[$x]->product_imei;
                $data2['product_brcode'][$x] = $categories[$x]->product_brcode;
                $data2['color'][$x] = $categories[$x]->color;
                $data2['sell_price'][$x] = $categories[$x]->sell_price;

                $data2['update_date'][$x]= "N";

                $product_id= $data2['product_id'];
                $product_name= $data2['product_name'];
                $product_brcode= $data2['product_brcode'];
                $product_imei= $data2['product_imei'];
                $color= $data2['color'];
                $sell_price= $data2['sell_price'];
            }
            return view('report.cash_memo')
                ->with('invoice_no', $invoice_no)
                ->with('payment_type', $payment_type)
                ->with('product_order_status', $product_order_status)
                ->with('create_Date', $create_Date)
                ->with('customer_name', $customer_name)
                ->with('customer_phone', $customer_phone)
                ->with('customer_email', $customer_email)
                ->with('customer_address', $customer_address)
                ->with('service_price', $service_price)
                ->with('discount_price', $discount_price)
                ->with('recive_amount', $recive_amount)
                ->with('deu_amount', $deu_amount)
                ->with('grand_total', $grand_total)
                ->with('product_id', $product_id)
                ->with('product_name', $product_name)
                ->with('product_brcode', $product_brcode)
                ->with('product_imei', $product_imei)
                ->with('color', $color)
                ->with('sell_price', $sell_price)
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

        $categories = DB::select("SELECT PO.invoice_no, PI.product_name,PO.customer_info_id,CI.customer_name,PO.grand_total, PO.create_by,UI.user_name
                                    FROM product_order PO,product_order_invoice POI,customer_info CI,product_info PI,user_info UI
                                    WHERE CI.customer_info_id = PO.customer_info_id
                                    AND PO.invoice_no = POI.invoice_no
                                    AND POI.product_id = PI.product_id
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

            $data1 = array();

            $data1['invoice_no'] = $invoice_no;
            $data1['customer_info_id'] = $request['customer_id'];
            $data1['service_price'] = $request['other_price'];
            $data1['discount_price'] = $request['discount_price'];
            $data1['recive_amount'] = $request['ReceiveAmount'];
            $data1['deu_amount'] = $request['DeuAmount'];
            $data1['grand_total'] = $request['GrandTotal'];
            $data2['payment_type'] = $request['payment_type'];
            $data2['product_order_status'] = $request['product_order_status'];
            $data1['create_by'] =Session::get('user_info_id');
            $data1['create_date'] =$this->getDates();
            $data1['update_by'] = "N";
            $data1['update_date'] = "N";

            $result = DB::table('product_order')->insert($data1);


            $product_id = $request['product_id'];
            $product_brcode = $request['product_brcode'];

            $data2 = array();
            for ($x = 0; $x < count($product_id); $x++) {

                $data2['invoice_no'] = $invoice_no;
                $data2['product_id'] = $product_id[$x];
                $data2['bar_code'] = $product_brcode[$x];
                $data2['create_by'] =Session::get('user_info_id');
                $data2['create_date'] =$this->getDates();
                $data2['update_by'] = "N";
                $data2['update_date'] = "N";

                $result1 = DB::table('product_order_invoice')->insert($data2);

                $data11 = array();
                $data11['sell_status'] = "0";

                DB::table('product_stock_dtl')
                    ->where('product_brcode', $product_brcode[$x])
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

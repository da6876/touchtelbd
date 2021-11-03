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

    public function getAllProductInfoForSell()
    {

        $categories = DB::select("SELECT PI.product_id,CONCAT( product_name,' - InVoice : ',invice_no,' - Price : ',sell_price)  AS name,sell_price,product_name,product_ime,color
                                    FROM product_info PI,product_stock PS
                                    WHERE PI.product_id = PS.product_id
                                    ORDER BY PI.product_id");

        return DataTables::of($categories)
            ->addColumn('action', function ($categories) {
                $buttton = '
                <div class="button-list">
                    <a onclick="showProductData(' . "'$categories->product_id'" . ',' . "'$categories->product_name'" . ',' . "'$categories->sell_price'" . ',' . "'$categories->product_ime'" . ',' . "'$categories->color'" . ')" role="button" href="#" class="btn btn-success btn-sm"><i class="fa fa-cart-plus"></i></a>
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
}

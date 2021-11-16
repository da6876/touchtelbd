<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use Session;
use Redirect;

class CategoryInfoController extends Controller
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
            return view('productconfig.category');
        } catch (\Exception $e) {
            return view('errorpage.database_error');
        }
    }

    public function store(Request $request)
    {
        $data = array();
        $data['categories_name'] = $request['categories_name'];
        $data['categories_status'] = $request['categories_status'];

        $result = DB::table('categories')->insert($data);
        return json_encode(array(
            "statusCode" => 200,
            "statusMsg" => "Categories Added Successfully"
        ));

    }

    public function show($id)
    {
        $singleDataShow = DB::table('categories')
            ->where('categories_id', $id)
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
        $data['categories_status'] = "D";
        DB::table('categories')
            ->where('categories_id', $id)
            ->update($data);
        return json_encode(array(
            "statusCode" => 200
        ));
    }

    public function getAllcategories()
    {

        $categories = DB::select ('SELECT categories_id, categories_name, categories_status, create_info FROM categories WHERE categories_status = "A";');

        return DataTables::of($categories)
            ->addColumn('action', function ($categories) {
                $buttton = '
                <div class="button-list">
                    <a onclick="deletecategoriesData('.$categories->categories_id.')" role="button" href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash-o bigfonts"></i></a>
                </div>
                ';
                return $buttton;
            })
            ->rawColumns(['action'])
            ->toJson();

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use Session;
use Redirect;


class UserTypeController extends Controller
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
            return view('usermanage.user_type');
        } catch (\Exception $e) {

            return view('errorpage.database_error');
        }
    }

    public function store(Request $request)
    {
        try {
            if ($request['user_type_id']==""){
                $data = array();
                $data['user_type_name'] = $request['user_type_name'];
                $data['user_type_status'] = $request['user_type_status'];

                $result = DB::table('user_type')->insert($data);
                return json_encode(array(
                    "statusCode" => 200,
                    "statusMsg" => "User Type Added Successfully"
                ));
            }else{
                $data = array();
                $user_type_id = $request['user_type_id'];
                $data['user_type_name'] = $request['user_type_name'];
                $data['user_type_status'] = $request['user_type_status'];

                DB::table('user_type')
                    ->where('user_type_id', $user_type_id)
                    ->update($data);

                return json_encode(array(
                    "statusCode" => 200,
                    "statusMsg" => "User Type Update Successfully"
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
            $singleDataShow = DB::table('user_type')
                ->where('user_type_id', $id)
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
            DB::table('user_type')
                ->where('user_type_id', $id)
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

    public function getAllUserType()
    {

        $UserType = DB::table('user_type')
            ->get();

        return DataTables::of($UserType)
            ->addColumn('action', function ($UserType) {
                $buttton = '
                <div class="button-list">
                    <a onclick="showUserTypeData(' . $UserType->user_type_id . ')" role="button" href="#" class="btn btn-success btn-sm"><i class="fa fa-external-link-square bigfonts"></i></a>
                    <a onclick="deleteUserTypeData(' . $UserType->user_type_id . ')" role="button" href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash-o bigfonts"></i></a>
                </div>
                ';
                return $buttton;
            })
            ->rawColumns(['action'])
            ->toJson();

    }
}

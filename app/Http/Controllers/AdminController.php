<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }
    public function registeruser(){

        return view('admin.user.index');
    }

    public function allUser()
    {
        $data=User::latest()->get();
        return response()->json($data);
    }
    public function banuser(Request $request,$id){
        $requireduser=User::findOrFail($id);
        if($requireduser->status==0){
            $user=User::findOrFail($id)->update([
                'status'=>1,
            ]);
        }else if($requireduser->status==1){
            $user=User::findOrFail($id)->update([
                'status'=>0,
            ]);
        }


    }


    public function userFetchList() {
        $data=User::latest()->simplePaginate(5);
        return response()->json($data);
    }

    public function active_deactive_user($id) {
            $user = User::find($id);
            if($user->status == 1) {
                $user->status = 0;
            } else {
            $user->status = 1;
            }
            if($user->save()) {
                return response()->json('success');
            } else {
                return response()->json('failed');
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('adminloginpage');
    }
}

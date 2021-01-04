<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function view(){
        $data['allData'] = User::where('usertype','Admin')->get();

       return view('backend.user.view-user',$data);
    }


    public function add(){
        return view('backend.user.add-user');
    }

    public function store(Request $request){

        $data = new User();
        $code = rand(0000,9999);
        $data->usertype = 'Admin';
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($code) ;
        $data->code = $code;
        $data->save();
        return redirect()->route('users.view');
    }


    public function edit($id)
    {
        $editData = User::find($id);
        return view('backend.user.edit-user',compact('editData'));
    }



    public function update(Request $request, $id){
        $data = User::find($id);
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;

        $data->save();
        return redirect()->route('users.view')->with('success','data updated successfully');
    }
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.view')->with('success','data deleted successfully');
    }
}

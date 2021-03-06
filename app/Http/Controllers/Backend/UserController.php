<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function view(){
        $data['allData'] = User::all();
        return view('backend.user.view-user', $data);
    }

    public function add(){
        return view('backend.user.add-user');
    }

    public function store(Request $request){
        $request->validate([
            'usertype' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        $data = new User();
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        return redirect()->route('users.view')->with('success', 'User created successful!');

    }

    public function edit($id){
        $editData = User::find($id);
        return view('backend.user.edit-user', compact('editData'));
    }

    public function update($id,Request $request){
        $data = User::find($id);
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();
        return redirect()->route('users.view')->with('success', 'User info updated!');
    }

    public function delete($id){
        $data = User::find($id);
        if(file_exists('public/upload/user_images'.$data->image) AND !empty($data->image)){
            unlink('public/upload/user_images'.$data->image);
        }
        $data->delete();
        return redirect()->route('users.view')->with('success', 'User Deleted!');
    }
}

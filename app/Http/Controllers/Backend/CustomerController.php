<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Customer;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function view(){
        $allData = Customer::all();
        return view('backend.customer.view-customer', compact('allData'));
    }

    public function add(){
        return view('backend.customer.add-customer');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'mobile_no' => 'required',
            'email' => 'required|unique:customers',
            'address' => 'required',
        ]);

        $data = new Customer();
        $data->name = $request->name;
        $data->mobile_no = $request->mobile_no;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->created_by = Auth::user()->id;
        $data->save();

        return redirect()->route('customers.view')->with('success', 'Customer added successful!');
    }

    public function edit($id){
        $editData = Customer::find($id);
        return view('backend.customer.edit-customer', compact('editData'));
    }

    public function update($id, Request $request){
        $data = Customer::find($id);
        $data->name = $request->name;
        $data->mobile_no = $request->mobile_no;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return redirect()->route('customers.view')->with('success', 'Customer info updated!');
    }

    public function delete($id){
        $data = Customer::find($id);
        $data->delete();
        return redirect()->route('customers.view')->with('warning', 'Customer Deleted!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CustomerController extends Controller
{
    public function index () {
        $customers = Customer::get();
        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
        ]);

        if($request->has('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/customer/';
            $file->move($path, $filename);
        }

        Customer::create([
            'name' => $request->name,
            'image' => $path.$filename,
        ]);

        return redirect('customer/create')->with('status','Customer Created');
    }

    public function edit(int $id) {
        $customer = Customer::findOrFail($id);
        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, int $id){
        $request->validate([
            'name' => 'required|max:255|string',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
        ]);

        $customer = Customer::findOrFail($id);

        if($request->has('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/customer/';
            $file->move($path, $filename);
        }

        if(File::exists($customer->image)){
            File::delete($customer->image);
        }


        $customer->update([
            'name' => $request->name,
            'image' => $path.$filename,
        ]);

        return redirect()->back()->with('status','Customer Updated');
    }

    public function destroy(int $id)
    {
        $customer = Customer::findOrFail($id);
        if(File::exists($customer->image)){
            File::delete($customer->image);
        }

        $customer->delete();
        return redirect()->back()->with('status','Customer Deleted');
    }

}

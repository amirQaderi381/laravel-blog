<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addresses = Address::all();
        return view('admin.address.index' , compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.address.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required'
        ]);

        $inputs = $request->all();
        Address::create($inputs);
        return redirect()->route('admin.address.index')->with('swal-success','آدرس جدید شما با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        return view('admin.address.edit',compact('address'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address)
    {
        $validated = $request->validate([
            'address'=>'required',
        ]);

        $inputs = $request->all();

        $address->update($inputs);
        return redirect()->route('admin.address.index')->with('swal-success','آدرس شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->route('admin.address.index')->with('swal-success', 'آدرس  شما با موفقیت حذف شد');
    }

    public function status(Address $address)
    {
        $address->status = $address->status == 0 ? 1 : 0;
        $result=$address->save();
        if($result == true)
        {
            if($address->status == 0)
            {
                return response()->json(['status'=>true , 'checked'=>false]);

            }else{

                return response()->json(['status'=>true , 'checked'=>true]);
            }

        }else{

            return response()->json(['status'=>false]);
        }
    }
}

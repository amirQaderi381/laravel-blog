<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuickLinkRequest;
use App\Http\Requests\UpdateQuickLinkRequest;
use App\Models\Address;
use App\Models\QuickLink;
use Illuminate\Http\Request;

class QuickLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quickLinkes = QuickLink::all();
        return view('admin.quick-links.index' , compact('quickLinkes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.quick-links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'link' => 'required'
        ]);

        $inputs = $request->all();
        QuickLink::create($inputs);
        return redirect()->route('admin.quickLink.index')->with('swal-success','لینک جدید شما با موفقیت ثبت شد');
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
    public function edit(QuickLink $quickLink)
    {
        return view('admin.quick-links.edit',compact('quickLink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QuickLink  $quickLink)
    {
        $validated = $request->validate([
            'title'=>'required',
            'link' => 'required'
        ]);

        $inputs = $request->all();

        $quickLink->update($inputs);
        return redirect()->route('admin.quickLink.index')->with('swal-success','لینک شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
        public function destroy(QuickLink $quickLink)
    {
        $quickLink->delete();
        return redirect()->route('admin.quickLink.index')->with('swal-success', 'لینک  شما با موفقیت حذف شد');
    }
}

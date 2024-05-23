<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , ImageService $imageService)
    {
        $validated = $request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        $inputs = $request->all();

        service::create($inputs);
        return redirect()->route('admin.service.index')->with('swal-success','خدمات جدید شما با موفقیت ثبت شد');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service , ImageService $imageService)
    {
        $validated = $request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        $inputs = $request->all();

        $service->update($inputs);
        return redirect()->route('admin.service.index')->with('swal-success','خدمات شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.service.index')->with('swal-success', 'خدمات  شما با موفقیت حذف شد');
    }

    public function status(Service $service)
    {
        $service->status = $service->status == 0 ? 1 : 0;
        $result=$service->save();
        if($result == true)
        {
            if($service->status == 0)
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

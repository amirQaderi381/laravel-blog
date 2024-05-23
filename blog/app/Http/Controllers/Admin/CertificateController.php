<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificates = Certificate::all();
        return view('admin.certificate.index',compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.certificate.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , ImageService $imageService)
    {
        $validated = $request->validate([
            'title'=>'required',
            'image' => 'required|mimes:png,jpg,jpeg,giff',
        ]);

        $inputs = $request->all();

        if($request->hasFile('image')) {

            $imageService->setExclusiveDirectory('images'.DIRECTORY_SEPARATOR.'certificate');
            $result=$imageService->save($request->file('image'));
        }

        if($result == false)
        {
            return redirect()->route('admin.content.banner.index')->with('swal-error','آپلود تصویر با خطا مواجه شد');
        }

        $inputs['image'] = $result;
        Certificate::create($inputs);
        return redirect()->route('admin.certificate.index')->with('swal-success','مدرک جدید شما با موفقیت ثبت شد');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate)
    {
        return view('admin.certificate.edit',compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certificate $certificate , ImageService $imageService)
    {
        $validated = $request->validate([
            'title'=>'required',
            'image' => 'mimes:png,jpg,jpeg,giff',
        ]);

        $inputs = $request->all();

        if($request->hasFile('image'))
        {
            if(!empty($certificate->image))
            {
                $imageService->DeleteImage($certificate->image);
            }
            $imageService->setExclusiveDirectory('images'.DIRECTORY_SEPARATOR.'certificate');
            $result=$imageService->save($request->file('image'));

            if($result == false)
            {
                return redirect()->route('admin.certificate.index')->with('swal-error','آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }

        $certificate->update($inputs);
        return redirect()->route('admin.certificate.index')->with('swal-success','مدرک شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return redirect()->route('admin.certificate.index')->with('swal-success', 'مدرک  شما با موفقیت حذف شد');
    }

    public function status(Certificate $certificate)
    {
        $certificate->status = $certificate->status == 0 ? 1 : 0;
        $result=$certificate->save();
        if($result == true)
        {
            if($certificate->status == 0)
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::orderBy('position','desc')->get();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , ImageService $imageService)
    {
        $validated = $request->validate([
            'title'=>'required',
            'image' => 'required|mimes:png,jpg,jpeg,giff',
            'position' => 'required'
        ]);

        $inputs = $request->all();

        if($request->hasFile('image')) {

            $imageService->setExclusiveDirectory('images'.DIRECTORY_SEPARATOR.'slider');
            $result=$imageService->save($request->file('image'));
        }

        if($result == false)
        {
            return redirect()->route('admin.content.banner.index')->with('swal-error','آپلود تصویر با خطا مواجه شد');
        }

        $inputs['image'] = $result;
        Slider::create($inputs);
        return redirect()->route('admin.slider.index')->with('swal-success','اسلایدر جدید شما با موفقیت ثبت شد');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider , ImageService $imageService)
    {
        $validated = $request->validate([
            'title'=>'required',
            'image' => 'mimes:png,jpg,jpeg,giff',
            'position' => 'required'
        ]);

        $inputs = $request->all();

        if($request->hasFile('image'))
        {
            if(!empty($slider->image))
            {
                $imageService->DeleteImage($slider->image);
            }
            $imageService->setExclusiveDirectory('images'.DIRECTORY_SEPARATOR.'slider');
            $result=$imageService->save($request->file('image'));

            if($result == false)
            {
                return redirect()->route('admin.slider.index')->with('swal-error','آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }

        $slider->update($inputs);
        return redirect()->route('admin.slider.index')->with('swal-success','اسلایدر شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('admin.slider.index')->with('swal-success', 'اسلایدر  شما با موفقیت حذف شد');
    }

    public function status(Slider $slider)
    {
        $slider->status = $slider->status == 0 ? 1 : 0;
        $result=$slider->save();
        if($result == true)
        {
            if($slider->status == 0)
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

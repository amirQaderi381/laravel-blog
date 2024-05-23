<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Models\Collaborator;
use Illuminate\Http\Request;

class CollaboratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collaborators = Collaborator::all();
        return view('admin.collaborator.index',compact('collaborators'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.collaborator.create');
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

            $imageService->setExclusiveDirectory('images'.DIRECTORY_SEPARATOR.'collaborator');
            $result=$imageService->save($request->file('image'));
        }

        if($result == false)
        {
            return redirect()->route('admin.content.banner.index')->with('swal-error','آپلود تصویر با خطا مواجه شد');
        }

        $inputs['image'] = $result;
        Collaborator::create($inputs);
        return redirect()->route('admin.collaborator.index')->with('swal-success','خدمات جدید شما با موفقیت ثبت شد');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collaborator $collaborator)
    {
        return view('admin.collaborator.edit',compact('collaborator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Collaborator $collaborator , ImageService $imageService)
    {
        $validated = $request->validate([
            'title'=>'required',
            'image' => 'mimes:png,jpg,jpeg,giff',
        ]);

        $inputs = $request->all();

        if($request->hasFile('image'))
        {
            if(!empty($collaborator->image))
            {
                $imageService->DeleteImage($collaborator->image);
            }
            $imageService->setExclusiveDirectory('images'.DIRECTORY_SEPARATOR.'collaborator');
            $result=$imageService->save($request->file('image'));

            if($result == false)
            {
                return redirect()->route('admin.collaborator.index')->with('swal-error','آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }

        $collaborator->update($inputs);
        return redirect()->route('admin.collaborator.index')->with('swal-success','خدمات شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collaborator $collaborator)
    {
        $collaborator->delete();
        return redirect()->route('admin.collaborator.index')->with('swal-success', 'خدمات  شما با موفقیت حذف شد');
    }

    public function status(Collaborator $collaborator)
    {
        $collaborator->status = $collaborator->status == 0 ? 1 : 0;
        $result=$collaborator->save();
        if($result == true)
        {
            if($collaborator->status == 0)
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

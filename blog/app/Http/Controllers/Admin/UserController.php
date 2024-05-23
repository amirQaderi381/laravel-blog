<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins =  User::where('user_type',1)->get();
        return view('admin.user.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'user_name' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

         $inputs = $request->all();
         $inputs['user_type'] = 1;
         $user = User::create($inputs);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('admin.user.admin-user.index')->with('swal-success', ' ادمین  شما با موفقیت ثبت شد');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'=>'required',
            'status'=>'required|numeric|in:0,1',
        ]);

        $inputs = $request->all();


        $user->update($inputs);
        return redirect()->route('admin.user.admin-user.index')->with('swal-success','ادمین شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.admin-user.index')->with('swal-success', 'ادمین  شما با موفقیت حذف شد');
    }

    public function status(User $user)
    {
        $user->status = $user->status == 0 ?  1 : 0;
        $result = $user->save();

        if($result)
        {
            if($user->status == 0)
            {
                return response()->json(['status' => true , 'checked' => false]);

            }else{

                return response()->json(['status' => true , 'checked' => true]);
            }

        }else{

            return response()->json(['status' => false]);
        }
    }

}

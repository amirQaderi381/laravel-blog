<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $contacts = Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name'=>'required',
            'user_name'=>'required',
            'comment'=>'required'
        ]);

        $inputs = $request->all();
        Contact::create($inputs);
        return redirect()->back()->with(['success'=>'پیام شما با موفقیت ثبت شد']);
    }
}

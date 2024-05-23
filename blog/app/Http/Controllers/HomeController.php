<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Collaborator;
use App\Models\Service;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index(){

        $sliders = Slider::where('status' , 1)->orderBy('position','desc')->get();
        $services = Service::where('status' , 1)->get();
        $certificates = Certificate::where('status' , 1)->get();
        $collaborators = Collaborator::where('status' , 1)->get();
        return view('home.home',compact(['sliders','services','certificates','collaborators']));
    }
}

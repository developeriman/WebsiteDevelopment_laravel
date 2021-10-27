<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo; 
use App\Models\Slider; 

class FrontendController extends Controller
{
    public function index(){
        $this->data['logo']=Logo::first();
        $this->data['sliders']=Slider::all();
        
        return view('frontend.layouts.home',$this->data);
    }

     public function AboutUs(){
        return view('frontend.single_pages.about-us');
    }
    public function ContactUs(){
        return view('frontend.single_pages.contact-us');
    }
}

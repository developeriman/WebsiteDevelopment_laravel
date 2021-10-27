<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider; 
use App\Models\Logo; 
use Auth; 
use File; 

class SliderController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        $this->data['allData'] =Slider::orderBy('id', 'desc')->get(); 
        return view('backend.slider.view-slider',$this->data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
         return view('backend.slider.add-slider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $data =new Slider(); 
          $data->short_title =$request->short_title;
          $data->long_title =$request->long_title;
          $data->created_by =Auth::user()->id; 
          if($request->hasFile('image')){
            $file =$request->file('image');
            $ext =$file->getClientOriginalExtension();
            $fileName =time().'.'.$ext; 
            $file->move('upload/slider_images',$fileName);
            } 
            $data->image =$fileName; 
            $data->save();
         return redirect()->route('sliders.index')->with('success',"File uploaded successfully");

     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['editData'] = Slider::find($id);
        return view('backend.slider.edit-slider',$this->data);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Slider::find($id); 
        $data->short_title =$request->short_title; 
        $data->long_title =$request->long_title; 
        $data->updated_by =Auth::user()->id; 
        if($request->hasFile('image')){
            $path ='upload/slider_images/'.$data->image;
            if(File::exists($path)){
                File::delete($path);
            } 

            $file =$request->file('image');
            $ext =$file->getClientOriginalExtension();
            $fileName =time().'.'.$ext; 
            $file->move('upload/slider_images',$fileName);
            $data->image =$fileName; 
            $data->update(); 
        return redirect()->route('sliders.index')->with('success',"Slider Updated Succesfully");
    }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slider::find($id)->delete(); 
       return redirect()->route('sliders.index')->with('success',"Slider Deleted Sucessfully");

    }
}

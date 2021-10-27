<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File; 
use Auth; 
use App\Models\Vision; 

class VisionController extends Controller
{  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->data['countVision']=Vision::count();
        $this->data['allData'] =Vision::orderBy('id', 'desc')->get(); 
        return view('backend.vision.view-vision',$this->data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
         return view('backend.vision.add-vision');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $data =new Vision(); 
          $data->title =$request->title;
          $data->created_by =Auth::user()->id; 
          $data->updated_by =Auth::user()->id; 
          if($request->hasFile('image')){
            $file =$request->file('image');
            $ext =$file->getClientOriginalExtension();
            $fileName =time().'.'.$ext; 
            $file->move('upload/vision_images',$fileName);
            } 
            $data->image =$fileName; 
            $data->save();
         return redirect()->route('visions.index')->with('success',"Data uploaded successfully");

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
        $this->data['editData'] = Vision::find($id);
        return view('backend.vision.edit-vision',$this->data);  
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
        $data = Vision::find($id); 
        $data->title =$request->title; 
        $data->updated_by =Auth::user()->id; 
        if($request->hasFile('image')){
            $path ='upload/vision_images/'.$data->image;
            if(File::exists($path)){
                File::delete($path);
            } 

            $file =$request->file('image');
            $ext =$file->getClientOriginalExtension();
            $fileName =time().'.'.$ext; 
            $file->move('upload/vision_images',$fileName);
            $data->image =$fileName; 
            $data->update(); 
        return redirect()->route('visions.index')->with('success',"Vision Updated Succesfully");
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
        $data =  Vision::find($id); 
         $path ='upload/vision_images/'.$data->image;
            if(File::exists($path)){
                File::delete($path);
            } 
            $data->delete(); 
       return redirect()->route('visions.index')->with('success',"Vision Deleted Sucessfully");

    }
}

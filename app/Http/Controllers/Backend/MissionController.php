<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mission; 
use Auth; 
use File; 

class MissionController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->data['countMission']=Mission::count();
        $this->data['allData'] =Mission::orderBy('id', 'desc')->get(); 
        return view('backend.mission.view-mission',$this->data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
         return view('backend.mission.add-mission');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $data =new Mission(); 
          $data->title =$request->title;
          $data->created_by =Auth::user()->id; 
          $data->updated_by =Auth::user()->id; 
          if($request->hasFile('image')){
            $file =$request->file('image');
            $ext =$file->getClientOriginalExtension();
            $fileName =time().'.'.$ext; 
            $file->move('upload/mission_images',$fileName);
            } 
            $data->image =$fileName; 
            $data->save();
         return redirect()->route('missions.index')->with('success',"Data uploaded successfully");

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
        $this->data['editData'] = Mission::find($id);
        return view('backend.mission.edit-mission',$this->data);  
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
        $data = Mission::find($id); 
        $data->title =$request->title; 
        $data->updated_by =Auth::user()->id; 
        if($request->hasFile('image')){
            $path ='upload/mission_images/'.$data->image;
            if(File::exists($path)){
                File::delete($path);
            } 

            $file =$request->file('image');
            $ext =$file->getClientOriginalExtension();
            $fileName =time().'.'.$ext; 
            $file->move('upload/mission_images',$fileName);
            $data->image =$fileName; 
            $data->update(); 
        return redirect()->route('missions.index')->with('success',"Mission Updated Succesfully");
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
        $data =  Mission::find($id); 
         $path ='upload/mission_images/'.$data->image;
            if(File::exists($path)){
                File::delete($path);
            } 
            $data->delete(); 
       return redirect()->route('missions.index')->with('success',"Mission Deleted Sucessfully");

    }
}

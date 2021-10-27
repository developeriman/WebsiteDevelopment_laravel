<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service; 
use Auth; 
use File; 

class ServiceController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        $this->data['allData'] =Service::orderBy('id', 'desc')->get(); 
        return view('backend.service.view-service',$this->data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
         return view('backend.service.add-service');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $data =new Service(); 
          $data->short_title =$request->short_title;
          $data->long_title =$request->long_title;
          $data->created_by =Auth::user()->id; 
          $data->save();
         return redirect()->route('services.index')->with('success',"File uploaded successfully");

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
        $this->data['editData'] = Service::find($id);
        return view('backend.service.edit-service',$this->data);  
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
        $data = Service::find($id); 
        $data->short_title =$request->short_title; 
        $data->long_title =$request->long_title; 
        $data->updated_by =Auth::user()->id; 
    
        $data->update(); 
        return redirect()->route('services.index')->with('success',"Slider Updated Succesfully");
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::find($id)->delete(); 
       return redirect()->route('services.index')->with('success',"Slider Deleted Sucessfully");

    }
}

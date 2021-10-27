<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About; 
use Auth; 
use File; 


class AboutController extends Controller
{
    
    
    public function index()
    {     
        $this->data['allData'] =About::orderBy('id', 'desc')->get(); 
        return view('backend.about.view-about',$this->data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
         return view('backend.about.add-about');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $data =new About(); 
          $data->description =$request->description;
    
          $data->created_by =Auth::user()->id; 
          $data->save();
         return redirect()->route('abouts.index')->with('success',"Data uploaded successfully");

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
        $this->data['editData'] = About::find($id);
        return view('backend.about.edit-contact',$this->data);  
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
         $data = About::find($id); 
         $data->description =$request->description;
         $data->created_by =Auth::user()->id; 
         $data->updated_by =Auth::user()->id; 
     
        $data->update(); 
        return redirect()->route('abouts.index')->with('success',"Slider Updated Succesfully");
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        About::find($id)->delete(); 
       return redirect()->route('abouts.index')->with('success',"Slider Deleted Sucessfully");

    }
}

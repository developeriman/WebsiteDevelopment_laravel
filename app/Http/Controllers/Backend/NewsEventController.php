<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth; 
use File; 
use App\Models\NewsEvent; 


class NewsEventController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        $this->data['allData'] =NewsEvent::orderBy('id', 'desc')->get(); 
        return view('backend.news_event.view-news_event',$this->data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
         return view('backend.news_event.add-news_event');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =new NewsEvent(); 
         $data->date =date('Y-m-d',strtotime($request->date));
          $data->title =$request->title;
          $data->long_title =$request->long_title;
          $data->created_by =Auth::user()->id; 
          if($request->hasFile('image')){
            $file =$request->file('image');
            $ext =$file->getClientOriginalExtension();
            $fileName =time().'.'.$ext; 
            $file->move('upload/news_events_images',$fileName);
            } 
            $data->image =$fileName; 
            $data->save();
         return redirect()->route('news_events.index')->with('success',"File uploaded successfully");

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
        $this->data['editData'] = NewsEvent::find($id);
        return view('backend.news_event.edit-news_events',$this->data);  
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
        $data = NewsEvent::find($id);
        $data->date =date('Y-m-d',strtotime($request->date)); 
        $data->title =$request->title; 
        $data->long_title =$request->long_title; 
        $data->updated_by =Auth::user()->id; 
        if($request->hasFile('image')){
            $path ='upload/news_events_images/'.$data->image;
            if(File::exists($path)){
                File::delete($path);
            } 

            $file =$request->file('image');
            $ext =$file->getClientOriginalExtension();
            $fileName =time().'.'.$ext; 
            $file->move('upload/news_events_images',$fileName);
            $data->image =$fileName; 
            $data->update(); 
        return redirect()->route('news_events.index')->with('success',"News Event Updated Succesfully");
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
      $data =  NewsEvent::find($id); 
            $path ='./public/upload/news_events_images/'.$data->image;
            if(File::exists($path)){
                File::delete($path);
            }
             $data->delete();
       return redirect()->route('news_events.index')->with('success',"Slider Deleted Sucessfully");

    }
}

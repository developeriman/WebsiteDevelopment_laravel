<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact; 
use Auth; 
use File; 

class ContactController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        $this->data['allData'] =Contact::orderBy('id', 'desc')->get(); 
        return view('backend.contact.view-contact',$this->data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
         return view('backend.contact.add-contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $data =new Contact(); 
          $data->address =$request->address;
          $data->mobile_no =$request->mobile_no;
          $data->email =$request->email;
          $data->facebook =$request->facebook;
          $data->youtube =$request->youtube;
          $data->google_plus =$request->google_plus;
          $data->created_by =Auth::user()->id; 
          $data->save();
         return redirect()->route('contacts.index')->with('success',"Data uploaded successfully");

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
        $this->data['editData'] = Contact::find($id);
        return view('backend.contact.edit-contact',$this->data);  
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
         $data = Contact::find($id); 
         $data->address =$request->address;
          $data->mobile_no =$request->mobile_no;
          $data->email =$request->email;
          $data->facebook =$request->facebook;
          $data->youtube =$request->youtube;
          $data->google_plus =$request->google_plus;
          $data->created_by =Auth::user()->id; 
         $data->updated_by =Auth::user()->id; 
     
        $data->update(); 
        return redirect()->route('contacts.index')->with('success',"Slider Updated Succesfully");
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::find($id)->delete(); 
       return redirect()->route('contacts.index')->with('success',"Slider Deleted Sucessfully");

    }
}

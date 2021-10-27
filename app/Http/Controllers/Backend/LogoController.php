<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth; 
use App\Models\User;
use App\Models\Logo;
use File; 

class LogoController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['countLogo']=Logo::count();
     
        $this->data['allData'] =Logo::orderBy('id', 'desc')->get(); 
        return view('backend.logo.view-logo',$this->data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
         return view('backend.logo.add-logo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $data =new Logo(); 
          $data->created_by =Auth::user()->id; 
          if($request->hasFile('image')){
            $file =$request->file('image');
            $ext =$file->getClientOriginalExtension();
            $fileName =time().'.'.$ext; 
            $file->move('upload/logo_images',$fileName);
            } 
            $data->image =$fileName; 
            $data->save();
         return redirect()->route('logos.index')->with('success',"File uploaded successfully");

        

        // $data =new User; 
        // $data->usertype = $request->usertype; 
        // $data->name     = $request->name; 
        // $data->email    = $request->email; 
        // $data->password = bcrypt($request->password); 
        // $data->save(); 
        // return redirect()->route('users.index');
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
        $this->data['editData'] = Logo::find($id);
        return view('backend.logo.edit-logo',$this->data);  
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
        $data = Logo::find($id); 
        $data->updated_by =Auth::user()->id; 
        if($request->hasFile('image')){
            $path ='upload/logo_images/'.$data->image;
            if(File::exists($path)){
                File::delete($path);
            } 

            $file =$request->file('image');
            $ext =$file->getClientOriginalExtension();
            $fileName =time().'.'.$ext; 
            $file->move('upload/logo_images',$fileName);
            $data->image =$fileName; 
            $data->save(); 
        return redirect()->route('logos.index')->with('success',"Logo Updated Succesfully");
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
        Logo::find($id)->delete(); 
       return redirect()->route('logos.index')->with('success',"Logo Deleted Sucessfully");

    }


}

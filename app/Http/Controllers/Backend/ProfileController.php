<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use Auth; 
use App\Http\Requests\PasswordChangeRequest; 


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=     Auth::user()->id; 
        $this->data['user'] =  User::find($id);

        return view('backend.user.view-profile',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function passwordView(){
        return view("backend.user.edit-password"); 
    }

    public function passwordUpdate(PasswordChangeRequest $request){
            if(Auth::attempt(['id'=>Auth::user()->id,'password'=>$request->current_password])){
                  $user             = User::find(Auth::user()->id);
                  $user->password   = bcrypt($request->new_password); 
                  $user->save(); 
                  return redirect()->route('profiles.index')->with('success','Password Changed successfully');

            }
            else{
               return redirect()->back()->with('error','Sorry! your current password does not match'); 
            }
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
        $id                 = Auth::user()->id; 
        $this->data['editData'] = User::find($id);

        return view('backend.user.edit-profile',$this->data);
        
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
        $data = User::find(Auth::user()->id); 
        
         if($request->hasFile('image')){
            $path ='upload/user_images/'.$data->image;
            if(File::exists($path)){
                File::delete($path);
            } 
            $file =$request->file('image');
            $ext =$file->getClientOriginalExtension();
            $fileName =time().'.'.$ext; 
            $file->move('upload_image',$fileName);

            $data->usertype = $request->usertype; 
            $data->name     = $request->name; 
            $data->email    = $request->email; 
            $data->mobile   = $request->mobile; 
            $data->email    = $request->email; 
            $data->address  = $request->gender;
            $data->image    = $fileName;
            $data->update(); 
        return redirect()->route('profiles.index')->with('success',"Profile Data Updated Succesfully");
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
        //
    }
}

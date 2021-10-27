<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest; 

use App\Models\User; 

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['allData'] =User::orderBy('id', 'desc')->get(); 
        return view('Backend.user.view-user',$this->data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('Backend.user.add-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data =new User; 
        $data->usertype = $request->usertype; 
        $data->name     = $request->name; 
        $data->email    = $request->email; 
        $data->password = bcrypt($request->password); 
        $data->save(); 
        return redirect()->route('users.index');
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
        $this->data['editData'] = User::find($id);
        return view('backend.user.edit-user',$this->data);  
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
        $data = User::find($id); 
        $data->usertype = $request->usertype; 
        $data->name     = $request->name; 
        $data->email    = $request->email; 
        $data->update(); 
        return redirect()->route('users.index')->with('success',"User Data Updated Succesfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete(); 
       return redirect()->route('users.index')->with('success',"User Data Deleted Sucessfully");

    }
}

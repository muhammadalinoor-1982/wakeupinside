<?php

namespace App\Http\Controllers;

use App\crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'List Page';
        $data['cruds'] = Crud::withTrashed()->orderBy('id','desc')->get();
        $data['serial'] = 1;
        return  view('basic.crud.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create New User';
        return  view('basic.crud.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:cruds|email',
            'phone'=>'required',
            'address'=>'required',
            'gender'=>'required',
            'status'=>'required',
            'user_type'=>'required',
            'image'=>'image|required',
            'password'=>'required|confirmed'

        ]);
        $crud = $request->except('_token','password');
        $crud['password'] = bcrypt($request->password);
        $crud['created_by'] = 1;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $file_name = date('d.m.Y').'_'.time().'_'.rand(0000,9999).'_'.'L3T_'.$file->getClientOriginalName();
            $file->move('images/crud/',$file_name);
            $crud['image'] = 'images/crud/'.$file_name;
        }
        Crud::create($crud);
        session()->flash('message','User Created successfully');
        return redirect()->route('crud.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function show(crud $crud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Edit User';
        $data['crud'] = crud::findOrFail($id);
        return  view('basic.crud.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, crud $crud)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'sometimes|required|email|unique:cruds,email,'.$crud->id,
            'phone'=>'required',
            'address'=>'required',
            'gender'=>'required',
            'status'=>'required',
            'user_type'=>'required',
            'image'=>'image',
            'password'=>'confirmed'
        ]);
        $crud_data = $request->except('_token','_method','password');
        $crud_data['updated_by'] = 2;

        if($request->has('password'))
        {
            $crud_data['password'] = bcrypt($request->password);
        }

        if($request->hasFile('image')){
            $file = $request->file('image');
            $file_name = date('d.m.Y').'_'.time().'_'.rand(0000,9999).'_'.'L3T_'.$file->getClientOriginalName();
            $file->move('images/crud/',$file_name);
            File::delete($crud->image);
            $crud_data['image'] = 'images/crud/'.$file_name;
        }
        $crud->update($crud_data);
        session()->flash('message','User Updated successfully');
        return redirect()->route('crud.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function destroy(crud $crud)
    {
        $crud->delete();
        session()->flash('message','User Deleted successfully');
        return redirect()->route('crud.index');
    }
    public function restore($id)
    {
        $crud = crud::onlyTrashed()->findOrFail($id);
        $crud->restore();
        session()->flash('message','User restore successfully');
        return redirect()->route('crud.index');
    }
    public function delete($id)
    {
        $crud = crud::onlyTrashed()->findOrFail($id);
        File::delete($crud->image);
        $crud->forceDelete();
        session()->flash('message','User has been deleted permanently');
        return redirect()->route('crud.index');
    }
}

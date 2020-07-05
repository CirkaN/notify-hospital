<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Role;
use App\Http\Requests\HospitalStoreRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Hospital;
use Auth;
class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.hospital.index");
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
    public function store(HospitalStoreRequest $request)
    {
   
  
        $hospital_imageName = time().'.'.$request->hospital_image->extension();  
        $request->hospital_image->move(public_path('images'), $hospital_imageName);

        $hospital = new Hospital;
        $hospital->uuid = (string) Str::uuid();
        $hospital->user_id = Auth::guard('admin')->user()->id;
        $hospital->name = $request->hospital_name;
        $hospital->serialnum = $request->hospital_serial;
        $hospital->image = $hospital_imageName;
        $hospital->created_by = Auth::guard('admin')->user()->name;
        $hospital->save();
     
        return redirect()->route('admin.dashboard.index');

     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $hospital = Hospital::whereuuid($uuid)->first();
        $specialities = Role::all();
        return view("admin.hospital.show")->with("hospital",$hospital)->with('specialities',$specialities);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Hospital = Hospital::find($id);
        $Hospital->delete();
        return back();
    }
}

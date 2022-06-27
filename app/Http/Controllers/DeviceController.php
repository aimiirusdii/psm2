<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Devices;
use Illuminate\Support\Facades\Hash;
use Auth;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $Devices = Devices::get();

        return view('devices.index',compact('Devices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('devices.create');
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
            'd_serial_no'=>'required',
            'd_name'=>'required',
            'd_location_name'=> 'required',
            'd_latitude' => 'required',
            'd_longitude'=> 'required',
            'd_status' => 'required',
        ]);
    
         Devices::create([
            'd_serial_no' => $request->d_serial_no,
            'd_name' => $request->d_name,
            'd_location_name' => $request->d_location_name,
            'd_latitude' => $request->d_latitude,
            'd_longitude' => $request->d_longitude,
            'd_status' => $request->d_status,
        ]);

       toastr()->success('Devices has been added successfully!');
       
       return redirect('/devices');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Devices = Devices::where('id', $id)->first();
        return view('devices.show',compact('Devices'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Devices = Devices::find($id);

        return view('devices.edit', compact('Devices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $id = $request->input('id');
      $d_serial_no = $request->input('d_serial_no');
      $d_name = $request->input('d_name');
      $d_location_name = $request->input('d_location_name');
      $d_latitude = $request->input('d_latitude');
      $d_longitude = $request->input('d_longitude');
      $d_status = $request->input('d_status');

       Devices::where('id', $id)->update([
            'd_serial_no' => $d_serial_no,
            'd_name' => $d_name,
            'd_location_name' => $d_location_name,
            'd_latitude' => $d_latitude,
            'd_longitude' => $d_longitude,
            'd_status' => $d_status,
       ]);


        toastr()->success('Devices has been updated successfully!');
        return redirect('/devices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Devices = Devices::find($id);
        $Devices->delete();

        toastr()->success('Devices has been deleted successfully!');
        return redirect('/devices');
    }

}

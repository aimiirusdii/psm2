<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Notifications, History};
use Auth;

class NotificationController extends Controller
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
        return view('notification.index');
    }

    public function store(Request $request)
    {
        Notifications::create([
            'd_serial_no' => $request->d_serial_no,
        ]);

        History::create([
            'd_serial_no' => $request->d_serial_no,
            'h_logs' => 'Water Level is rising, Cleaning process is required'
        ]);

       return 'ok';
    }

    public function update($id)
    {
        Notifications::where('id', $id)->update([
            'n_status' => '0',
        ]);

         return redirect('/history');
    }
    
}

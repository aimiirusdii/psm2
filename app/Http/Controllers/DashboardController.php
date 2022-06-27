<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Devices, Notifications};
use Auth;
use DB;

class DashboardController extends Controller
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
        $totalDevice = Devices::count();
        $totalNotification = Notifications::count();
        $totalDeviceActive = Devices::where('d_status','active')->count();
        $totalDeviceInactive = Devices::where('d_status','inactive')->count();

        $chartData = Notifications::select(
            DB::raw('count(d_serial_no) as counts'), 
            DB::raw("DATE_FORMAT(created_at,'%m-%Y') as months")
            )
          ->whereYear('created_at', date('Y'))
          ->groupBy('months')
          ->get();

         foreach ($chartData as $key => $value) {
             $months[] = $value->months;
             $counts[] = $value->counts;
         }

        return view('dashboard.index',compact('Devices', 'totalDevice', 'totalNotification','totalDeviceActive','totalDeviceInactive','months','counts'));
    }

    
}

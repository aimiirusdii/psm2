<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{History};
use Auth;

class HistoryController extends Controller
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
        $History = History::get();
        return view('history.index',compact('History'));
    }
    
}

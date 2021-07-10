<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Exports\EmbloyeeExport;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;
use App\User;
use Carbon\Carbon;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Excel;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $datess = Carbon::now()->toDateString();
        $enddate = User::select('enddate')->get();

        $datess = Carbon::now()->format('Y-m-d');

        return view('home',compact('datess','enddate'));
    }

    public function exportIntoExcel(){
        return Excel::download(new EmbloyeeExport,'employee.xlsx');
    }

    public function exportIntoCSV(){
        return Excel::download(new EmbloyeeExport,'employee.csv');
    }


}

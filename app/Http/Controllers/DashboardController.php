<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;
use Yajra\Datatables\Datatables; 
 
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class DashboardController extends Controller
{
  // Dashboard - Analytics
  public function dashboardAnalytics()
  {

        $data = Auth::user(); 
        $TenantCode= $data->DTCode;
        $ura_live_date = $data->ura_live_date;
        $login_flag = $data->all_distributor_flag;
        $current_date=date("Y-m-d");	
        $pageConfigs = ['pageHeader' => false];
        $user = ($data->name);  
       
   
    return view('/content/dashboard/dashboard-analytics', ['pageConfigs' => $pageConfigs, 'user' => $user]);
  }


  
  
}

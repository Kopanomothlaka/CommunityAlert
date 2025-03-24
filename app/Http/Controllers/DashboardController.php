<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use App\Models\Meeting;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {

        $alertsCount = Alert::count();
        $meetingsCount = Meeting::count();
        $usersCount = User::count();
        $meetings = Meeting::all();

        return view('admin.pages.welcome', compact('alertsCount', 'meetingsCount', 'usersCount' ,'meetings'));
    }





}

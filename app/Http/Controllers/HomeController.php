<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'is_admin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }
        return view('admin.home');
    }

    
    public function dashboard_index()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }
        
        $dates = collect();
        $userCounts = collect();
    
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i)->format('Y-m-d');
    
            // Tracer count per day
            $tracerCount = \App\Models\Tracer::whereDate('created_at', $date)->count();
    
            // User count per day
            $userCount = \App\Models\User::whereDate('created_at', $date)->count();
    
            $dates->push([
                'date' => $date,
                'count' => $tracerCount
            ]);
    
            $userCounts->push([
                'date' => $date,
                'count' => $userCount
            ]);
        }
    
        return view('admin.dashboard', [
            'last7Days' => $dates,
            'userCounts' => $userCounts
        ]);
    }

    public function list_graduates()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        return view('admin.graduates');
    }
}

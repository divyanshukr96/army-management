<?php

namespace App\Http\Controllers;

use App\Army;
use App\Audit;
use App\Leave;
use App\Punishment;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

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
     * @return Renderable
     */
    public function index()
    {
        $punishment = (object)[
            'data' => Punishment::latest()->take(10)->get(),
            'today' => Punishment::whereDate('created_at', Carbon::today())->count(),
            'total' => Punishment::whereDate('created_at', '<=', Carbon::today())->count()
        ];
        $leave = (object)[
            'today' => Leave::whereDate('created_at', Carbon::today())->count(),
            'current' => Leave::whereDate('to', '<=', Carbon::today())->count()
        ];
        $armies = (object)[
            'data' => Army::latest()->take(10)->get(),
            'complete' => Army::where('registered', true)->count(),
            'pending' => Army::where('registered', false)->count()
        ];
        $activities = auth()->user()->activities()->get();
        return view('admin', compact('punishment', 'leave', 'armies', 'activities'));
    }
}

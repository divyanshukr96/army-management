<?php

namespace App\Http\Controllers;

use App\Army;
use App\Audit;
use App\Leave;
use App\Punishment;
use App\User;
use Carbon\Carbon;
use Exception;
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
        $this->middleware('auth')->except('index');
    }


    public function index()
    {
//        if (!User::count()) return view('instruction');

        try {
            User::count();
        } catch (Exception $e) {
            if (file_exists(storage_path('installed'))) unlink(storage_path('installed'));
            return view('instruction');
        }

        return view('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function home()
    {
        $punishment = (object)[
            'data' => Punishment::latest()->take(10)->get(),
            'today' => Punishment::whereDate('created_at', Carbon::today())->count(),
            'total' => Punishment::whereDate('created_at', '<=', Carbon::today())->count()
        ];
        $leave = (object)[
            'today' => Leave::whereDate('created_at', Carbon::today())->count(),
            'current' => Leave::whereDate('to', '>=', Carbon::today())->count()
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

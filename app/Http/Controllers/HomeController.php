<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

use App\Port;
use DateTime;
use DateInterval;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index()
    {
        $ports = array();
        $user = Auth::user();
        if ($user) {
            $ports = Port::where('username', $user->name)->get();
        }
        $now = new DateTime();
        $current = $now->format('Y-m-d H:i:s');
        return view('home-dashboard', compact('ports', 'now', 'current'));
    }

    public function video()
    {
        sleep(2);
        return redirect('https://www.youtube.com/watch?v=5ujP9zrYiV4');
    }
}

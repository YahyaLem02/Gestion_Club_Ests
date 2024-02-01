<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Club;
use App\Models\Reclamation;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clubs = Club::all();

        $recentReclamations = Reclamation::with('adherant')
            ->orderBy('NumReclamation', 'desc')
            ->take(3)
            ->get();
        return view('welcome', [
            'clubs' => $clubs,
            'reclamations' => $recentReclamations,
        ]);
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('inici');
    }

    /**
     * Manage notification.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function notify(Request $request)
    {
        $response = $request->validate(['email' => 'required|email']);
        // return $response['email'];
        DB::insert('insert into notify (email) values (?)', [$response['email']]);
        return redirect()->route('home')->with('message', 'Gràcies. Us enviarem un correu amb un codi per poder accedir al període de proves.');
    }


}

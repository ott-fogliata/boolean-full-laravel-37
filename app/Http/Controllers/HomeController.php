<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Book;


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

        /*
        $user = Auth::user();
        if(empty($user)) {
            return 'You must be logged';
        }
        */

        $user = Auth::user();
        dump($user);

        $allBooks = Book::all();

        // Bonus:
        $bookFiltrati = Book::where('price', '>', 10)->get();

        return view('home', compact('allBooks', 'bookFiltrati'));
    }
}

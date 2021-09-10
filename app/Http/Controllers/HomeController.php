<?php

namespace App\Http\Controllers;  

use Illuminate\Http\Request;  // invece del require_once, ma fa riferimento sempre a classi (o a traits)
use App\Book;

class HomeController extends Controller
{
    
    public function index() {
        /*
        $dato = 'un valore';
        $dato1 = 'un altro valore';
        $dato2 = 'ancora un valore';

        return view('home', [
            'dato' => $dato,
            'dato1' => $dato1
            ...
        ]); */
        // [ 'dato' => 'un valore' ]

        // dump(compact('dato', 'dato1', 'dato2'));
        // die();
        // return view('home', compact('dato', 'dato1', 'dato2'));

        // SELECT * FROM books
        $allBooks = Book::all();

        // Bonus:
        $bookFiltrati = Book::where('price', '>', 10)->get();

        return view('home', compact('allBooks', 'bookFiltrati'));


        //dump($allBooks);
        //dump($allBooks[0]->title);

        /* il compact darà:

            [
                'allBooks' => [
                    // libro 1,
                    // libro 2,
                    // libro 3
                ]
            ];
        */


    }

}



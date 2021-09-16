<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();

        return view('cars.index', compact('cars'));

    }

    /**
     * Show the form for creating a new resource.
     * Mostra un form vuoto per popolare tutti i dati del nostro modello.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     * Riceve tutti i dati dalla form (dopo il submit)
     * e salva il nostro oggetto nel database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // recupero i dati dalla request
        // creo un oggetto dal modello Car
        // setto tutti i parametri con i dati dalla request
        // $car->save();

        $request->validate([
            'picture' => 'url'
        ]);

        $data = $request->all(); // ritorna tutti i valori del form in un array associativo


        /*
        if(key_exists('brand_new', $data)) {
            $brand_new = true;
        } else {
            $brand_new = false;
        }
        */

        $car = new Car();
    
        $car->brand = $data['brand'];
        $car->model_name = $data['model_name'];
        $car->engine = $data['engine'];
        $car->hp = $data['hp'];
        $car->vin = $data['vin'];
        $car->color = $data['color'];
        $car->picture = $data['picture'];
        $car->brand_new = key_exists('brand_new', $data) ? true: false;
        $car->price = $data['price'];
        $car->save();  // salva nel database
        
        return redirect()->route('cars.show', $car->id);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // query per prendere la macchina 
        // con quell'id e riportare i dati nella view

        $car = Car::find($id);
        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

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
    
        $this->fillAndSaveCar($car, $data);
        
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
     * 
     * la rotta riceverà come parametro un id cars/{car}/edit
     * (per esempio: http://127.0.0.1:8000/cars/12/edit)
     * lui riceve un id, poi cerca di trasformare l'id in un oggetto
     * --> nella trasformazione va a leggere direttamente dal db.
     *
     */
    public function edit(Car $car)  
    {  
        /*
            - creare la form 
            - dal controller passare l'oggetto alla form 
            - la form mostrerà al posto dei vari value degli input il valore relativo all'oggetto
            - il pulsante submit/la form condurranno al controller update
            - l'update aggiornerà sempre quell'oggetto e salverà nel databse
        */

        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {

        $data = $request->all();       

        // $data['brand_new'] = key_exists('brand_new', $data) ? true: false;
        // $car->update($data);  // update = fill + save
        
        $this->fillAndSaveCar($car, $data);

        return redirect()->route('cars.show', $car);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route('cars.index');
    }

    private function fillAndSaveCar(Car $car, $data) {
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
    }
}

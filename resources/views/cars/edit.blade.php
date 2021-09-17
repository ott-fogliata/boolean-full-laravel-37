@extends('layouts.app')

@section('content')

<div class="container cars-container">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cars.update', $car) }}" method="POST">
        @csrf
        
        @method('PUT')

        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" class="form-control" name="brand" id="brand" value="{{ $car->brand }}">
        </div>

        <div class="form-group">
            <label for="model_name">Model Name</label>
            <input type="text" class="form-control" name="model_name" id="model_name" value="{{ $car->model_name }}">
        </div>
        
        <div class="form-group">
            <label for="engine">Engine</label>
            <input type="text" class="form-control" name="engine" id="engine" value="{{ $car->engine }}">
        </div>

        <div class="form-group">
            <label for="hp">HP</label>
            <input type="number" min="50" max="5000" class="form-control" name="hp" id="hp" value="{{ $car->hp }}">
        </div>

        <div class="form-group">
            <label for="vin">VIN</label>
            <input type="text" class="form-control" name="vin" id="vin" value="{{ $car->vin }}">
        </div>

        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" class="form-control" name="color" id="color" value="{{ $car->color }}">
        </div>

        <div class="form-group">
            <label for="picture">Picture</label>
            <input type="text" class="form-control" name="picture" id="picture" value="{{ $car->picture }}">
        </div>

        <div class="form-group">
            <label for="brand_new">Brand New</label>
            <input type="checkbox" id="brand_new" class="form-control" name="brand_new" {{ $car->brand_new ? 'checked': '' }}>

        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step="0.01" id="price" class="form-control" name="price" value="{{ $car->price }}">
        </div>

        <div class="form-group">
            <!--<input type="submit" value="Salva">-->
            <button type="submit" class="btn btn-primary">Salva</button>
        </div>
            
    </form>

</div>
@endsection

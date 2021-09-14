@extends('layouts.app')

@section('content')
<div class="container cars-container">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">brand</th>
        <th scope="col">model_name</th>
        <th scope="col">engine</th>
        <th scope="col">hp</th>
        <th scope="col">color</th>
        <th scope="col">picture</th>
        <th scope="col">price</th>
        <th scope="col">actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cars as $car)
            <tr>
                <th scope="row">{{$car->id}}</th>
                <td>{{$car->brand}}</td>
                <td>{{$car->model_name}}</td>
                <td>{{$car->engine}}</td>
                <td>{{$car->hp}}</td>
                <td>{{$car->color}}</td>
                <td><img src="{{$car->picture}}" alt="picture of {{$car->model_name}}" /></td>
                <td>{{$car->price}}</td>
                <!-- a href="/cars/{{$car->id}}" -->
                <td><a href="{{ route('cars.show', $car) }}"><i class="bi bi-zoom-in"></i></a></td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection

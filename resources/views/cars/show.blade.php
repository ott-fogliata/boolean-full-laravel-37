@extends('layouts.app')

@section('content')
<div class="container cars-container">
   {{$car->model_name}}
   <img src="{{$car->picture}}" />
</div>
@endsection

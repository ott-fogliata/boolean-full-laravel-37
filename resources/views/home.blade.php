<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    @foreach($allBooks as $book)
        <div class="card">
            <h2>{{$book->title}}</h2>
            <img src="{{ $book->cover }}" 
            alt="copertina del libro {{$book->title}}"/>
            <p>{{$book->abstract}}</p>
        </div>
    @endforeach
    
</body>
</html>
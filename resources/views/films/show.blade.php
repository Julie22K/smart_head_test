<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$film->title}}</title>
</head>
<body>
    <h2>{{$film->title}}</h2>
    <h3>Genres:</h3>
    <ul>
        @foreach($film->genres as $genre)
        <li>{{$genre->title}}</li>
        @endforeach
    </ul>
    
    <img src="{{ asset('/storage/files/' . $film->poster) }}" alt="{{ $film->title }}">
</body>
</html>

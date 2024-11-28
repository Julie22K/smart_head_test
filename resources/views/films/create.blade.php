<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add film</title>
</head>

<body>
    <h1>Add film</h1>
    <form action="/films" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" id="title">
        <label for="genres">Genres:</label>
        <select name="genres[]" id="genres" multiple>
            <option value=""></option>
            @foreach($genres as $genre)
            <option value="{{$genre->id}}">{{$genre->title}}</option>
            @endforeach
        </select>
        <label for="poster">Poster:</label>
        <input type="file" name="poster" id="poster">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <button type="submit">Create</button>
    </form>
</body>

</html>

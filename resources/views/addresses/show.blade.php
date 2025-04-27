<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Address {{  $address->id    }}</h1>
    <p>Country: {{ $address->country }}</p>
    <p>City: {{ $address->city }}</p>
    <p>Street: {{ $address->street }}</p>
    <p>Zip Code: {{ $address->zipCode }}</p>

    <button><a href="{{ route('addresses.edit') }}">Edit</a></button>
    <button><a href="{{ route('addresses.index') }}">Back</a></button>
    <form action="{{ route('addresses.destroy', $address->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
</body>
</html>
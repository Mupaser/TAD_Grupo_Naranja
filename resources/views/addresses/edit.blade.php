<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit Address {{ $address->id }}</h1>
    <form action="{{ route('addresses.update') }}" method="POST">
        @method('PUT')    
        @csrf
        <label for="country">Country:</label>
        <input type="text" name="country" value="{{ $address->country }}" required><br>

        <label for="city">City:</label>
        <input type="text" name="city" value="{{ $address->city }}" required><br>

        <label for="street">Street:</label>
        <input type="text" name="street" value="{{ $address->street }}" required><br>

        <label for="zipCode">Zip Code:</label>
        <input type="text" name="zipCode" value="{{ $address->zipCode }}" required><br>

        <button type="submit">Edit address</button>
        <button><a href="{{ route('addresses.index') }}">Back</a></button>
    </form>
</body>
</html>
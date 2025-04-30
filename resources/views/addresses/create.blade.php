<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit Address</h1>
    <form action="{{ route('addresses.store') }}" method="POST">
        @method('POST')
        @csrf
        <label for="country">Country:</label>
        <input type="text" name="country" id="country" required><br>

        <label for="city">City:</label>
        <input type="text" name="city" id="city" required><br>

        <label for="street">Street:</label>
        <input type="text" name="street" id="street" required><br>

        <label for="zipCode">Zip Code:</label>
        <input type="text" name="zipCode" id="zipCode" required><br>

        <button type="submit">Create address</button>
        <button><a href="{{ route('addresses.index') }}">Back</a></button>
    </form>
</body>
</html>
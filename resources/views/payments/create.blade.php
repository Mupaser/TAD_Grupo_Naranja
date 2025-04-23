<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create Payment</h1>
    <form action="{{ route('payment.store') }}" method="POST">
        @method('POST')
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>

        <button type="submit">Create Payment</button>
        <button><a href="{{ route('payment.index') }}">Back</a></button>
</body>
</html>
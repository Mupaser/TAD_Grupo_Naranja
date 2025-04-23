<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit Payment {{ $payment->id }}</h1>
    <form action="{{ route('payment.update') }}" method="POST">
        @method('PUT')    
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $payment->name }}" required><br>

        <button type="submit">Edit Payment</button>
        <button><a href="{{ route('payment.index') }}">Back</a></button>
    </form>
</body>
</html>
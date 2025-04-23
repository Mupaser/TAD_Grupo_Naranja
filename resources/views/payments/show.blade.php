<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Payment {{  $payment->id    }}</h1>
    <p>Name: {{ $payment->name }}</p>

    <button><a href="{{ route('payment.edit', $payment->id) }}">Edit</a></button>
    <button><a href="{{ route('payment.index') }}">Back</a></button>
    <form action="{{ route('payment.destroy', $payment->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
</body>
</html>
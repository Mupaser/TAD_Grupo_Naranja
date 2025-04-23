<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Addresses</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Country</th>
                <th>City</th>
                <th>Street</th>
                <th>Zip Code</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($addresses as $address)
                <tr>
                    <td>{{ $address->id }}</td>
                    <td>{{ $address->country }}</td>
                    <td>{{ $address->city }}</td>
                    <td>{{ $address->street }}</td>
                    <td>{{ $address->zipCode }}</td>
                    <td>
                        <button><a href="{{ route('address.show', $address->id) }}">Show</a></button>
                        <button><a href="{{ route('address.edit', $address->id) }}">Edit</a></button>
                        <form action="{{ route('address.destroy', $address->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <button><a href="{{ route('address.create') }}">Create Address</a></button>
</body>
</html>
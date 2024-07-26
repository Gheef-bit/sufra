<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Tim</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->tim }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{ route('/export-excel') }}" method="GET">
        <button type="submit">Download Excel</button>
    </form>
</body>
</html>
